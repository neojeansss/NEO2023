<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Mail\AccountMail;
use App\Mail\PaymentMail;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\Qualification;
use App\Models\PaymentProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['user'])->only(['create', 'edit', 'store']);
        $this->middleware(['admin'])->only(['accept', 'reject', 'downloadInvoice']);
        // $this->middleware('access.control:10')->except('index');
    }

    public function index()
    {
        //
    }

    public function create(Registration $registration)
    {   
        // PAYMENT DUE VALIDATION
        if (strtotime($registration->payment_due) < time() && !$registration->payment) {
            return redirect()->route('registrations.index')->with('failed', 'Your payment due has expired.');
        }

        $competitions = DB::table('competitions')
                        ->join('registration_details', 'competitions.id', 'registration_details.competition_id')
                        ->select('competitions.name', 'registration_details.price', DB::raw('count(*) as registrations_count'))
                        ->where('registration_details.registration_id', $registration->id)
                        ->groupBy('competitions.name', 'registration_details.price')
                        ->get();

        return view('dashboards.user.userPayment', [
            'registration' => $registration,
            'competitions' => $competitions,
            'payment_amount' => $registration->competitions->sum('pivot.price'),
            'paymentProviders' => PaymentProvider::all(),
        ]);
    }

    public function store(Request $request)
    {   
        // dd($request);
        $request->validate([
            'registration_id'=> 'required|integer',
            'payment_method'=> 'required|string',
            'account_number'=> 'required|string',
            'account_name'=> 'required|string',
            'payment_amount'=> 'required|integer',
            'payment_proof' => 'image|max:2000|mimes:jpg,png,jpeg',
        ],[
            'payment_proof.image'=> 'Your file must be in format image(jpg/png/jpeg)',
            'payment_proof.mimes'=> 'Your file must be in format image(jpg/png/jpeg)'
        ]);
        
        // PAYMENT DUE VALIDATION     
        if (strtotime($request->payment_due) < time())
            return redirect()->route('registrations.index')->with('failed', 'Your payment due has expired.');
        
        if ($request->hasFile('payment_proof')) {
            $extension = $request->file('payment_proof')->getClientOriginalExtension();
            $proofNameToStore = $request->input('account_number') . '_' . $request->input('account_name') . '_' . time() . '.' . $extension;
            $request->file('payment_proof')->storeAs('public/images/payment_proofs', $proofNameToStore);
        }
        
        Payment::create([
            'registration_id' => $request->registration_id,
            'payment_method' => $request->payment_method,
            'account_number' => $request->account_number,
            'account_name' => $request->account_name,
            'payment_amount' => $request->payment_amount,
            'payment_proof' => $proofNameToStore,
        ]);

        return redirect()->route('registrations.index')->with('success', 'Please wait for payment verification from the committee.');
    }

    public function show(Payment $payment)
    {
        //
    }

    public function edit(Payment $payment)
    {
        //
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'account_number' => 'required|string',
            'account_name' => 'required|string',
            'payment_proof' => 'required|image|max:1999|mimes:jpg,png,jpeg',
        ],[
            'payment_proof.image'=> 'Your file must be in format image(jpg/png/jpeg)',
            'payment_proof.mimes'=> 'Your file must be in format image(jpg/png/jpeg)'
        ]);
        
        if ($request->hasFile('payment_proof')) {
            $extension = $request->file('payment_proof')->getClientOriginalExtension();
            $proofNameToStore = $request->input('account_number') . '_' . $request->input('account_name') . '_' . time() . '.' . $extension;
            $request->file('payment_proof')->storeAs('public/images/payment_proofs', $proofNameToStore);
        }

        $payment->update([
            'account_number' => $request->account_number,
            'account_name' => $request->account_name,
            'payment_proof' => $proofNameToStore,
        ]);

        return redirect()->route('registrations.index')->with('success', 'Data updated successfully.');
    }

    public function destroy(Payment $payment)
    {
        //
    }

    public function accept(Payment $payment)
    {   
        DB::transaction(function () use($payment) {
            // UPDATE VERIFIY
            $payment->update([
                'is_verified' => 'accepted',
            ]);
            
            // SEND INVOICE MAIL
            Mail::to($payment->registration->user->email)->send(new PaymentMail($payment));

            foreach ($payment->registration->registrationDetails as $registrationDetail) {
                Qualification::create([
                    'rank' => 1,
                    'registration_detail_id' => $registrationDetail->id,
                ]);

                foreach ($registrationDetail->participants as $participant) {
                    $id = str_pad($participant->id, 3, '0', STR_PAD_LEFT);
                    $username = strtolower(explode(' ', trim($participant->name ))[0]) . $id;
                    $password = 'P' . $id;

                    $participant->update([
                        'username' => $username,
                        'password' => Hash::make($password),
                    ]);

                    // SEND PARTICIPANT ACCOUNT INFORMATION

                    // dd($participant);
                    Mail::to($participant->email)->send(new AccountMail($participant));
                }
            }
        });

        return redirect()->route('registrations.manage')->with('success', 'Payment accepted.');
    }

    public function reject(Payment $payment)
    {   
        $payment->delete();

        // Mail::to($payment->registration->user->email)->send(new PaymentMail($payment));

        return redirect()->route('registrations.manage')->with('success', 'Payment rejected.');
    }

    public function resendInvoice(Payment $payment)
    {   
        Mail::to($payment->registration->user->email)->send(new PaymentMail($payment));

        return redirect()->route('registrations.manage')->with('success', 'Invoice sent successfully.');
    }

    public function downloadInvoice(Payment $payment)
    {   
        $competitions = DB::table('competitions')
                            ->join('registration_details', 'competitions.id', 'registration_details.competition_id')
                            ->select('competitions.name', 'registration_details.price', 'registration_details.type', DB::raw('count(*) as registrations_count'))
                            ->where('registration_details.registration_id', $payment->registration->id)
                            ->groupBy('competitions.name', 'registration_details.price', 'registration_details.type')
                            ->get();

        $invoice = Pdf::loadView('payments.invoice', [
            'payment' => $payment,
            'competitions' => $competitions
        ]);

        $invoice->setPaper('a4')->setOption('enable-local-file-access', true);
        $id = str_pad($payment->id, 3, '0', STR_PAD_LEFT);

        return $invoice->download('Invoice ' . $id .'.pdf');
    }
}
