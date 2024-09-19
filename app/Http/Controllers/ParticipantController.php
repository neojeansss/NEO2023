<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Binusian;
use App\Models\Province;
use App\Models\Schedule;
use App\Mail\AccountMail;
use App\Models\Competition;
use App\Models\Environment;
use App\Models\Participant;
use Illuminate\Http\Request;
use App\Models\Qualification;
use App\Models\RegistrationDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreParticipantRequest;
use App\Http\Requests\UpdateParticipantRequest;

class ParticipantController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only('index', 'edit', 'update', 'export', 'sendAccountInfo', 'account', 'withdrawal');
        $this->middleware(['participant'])->except('index', 'edit', 'update', 'export', 'sendAccountInfo',  'account', 'withdrawal');
        $this->middleware(['admin'])->only('index', 'edit', 'update', 'export', 'sendAccountInfo', 'account', 'withdrawal');
    }

    public function __invoke()
    {

        $participant = Participant::where('id', Auth::guard('participant')->user()->id)->get('registration_detail_id')->first();
        $qualification = Qualification::where('registration_detail_id', $participant->registration_detail_id)->first();
        if ($qualification->rank == 0) {
            return redirect()->back()->with('failed', 'You have withdrawn. Please contact our committee for further information!');
        }

        $environment = Environment::where('name', 'like', '%' . $qualification->registrationDetail->competition->name . '%')->get();

        return view('dashboards.participant', [
            'qualification' => $qualification,
            'environment' => $environment,
            'schedules' => Schedule::where('competition_id', $qualification->registrationDetail->competition->id)->where('is_active', true)->get(),
        ]);
    }

    public function index()
    {
        $competitions = Competition::with(['participants' => function ($query) {
            $query->select([
                'participants.id', 'participants.name', 'participants.registration_detail_id',
                'participants.institution', 'participants.university_year',
                'participants.email', 'participants.phone_number',
                'participants.gender', 'participants.address',
                'participants.district', 'participants.province', 'participants.allergy'
            ]);
        }])->get();

        $participantsDebate = Participant::whereHas('registrationDetail', function ($query) {
            $query->whereRelation('competition', 'name', 'Debate')->whereHas('verifiedPayment')->whereHas('debateTeam');
        })->get(['id', 'name'])->count();
        $participantsNewscasting = Participant::whereHas('registrationDetail', function ($query) {
            $query->whereRelation('competition', 'name', 'Newscasting')->whereHas('verifiedPayment');
        })->get(['id', 'name'])->count();
        $participantsStorytelling = Participant::whereHas('registrationDetail', function ($query) {
            $query->whereRelation('competition', 'name', 'Storytelling')->whereHas('verifiedPayment');
        })->get(['id', 'name'])->count();
        $participantsSpeech = Participant::whereHas('registrationDetail', function ($query) {
            $query->whereRelation('competition', 'name', 'Speech')->whereHas('verifiedPayment');
        })->get(['id', 'name'])->count();
        
        return view('participants.index', [
            'competitions' => $competitions,
            'participantsDebate' => $participantsDebate,
            'participantsNewscasting' => $participantsNewscasting,
            'participantsStorytelling' => $participantsStorytelling,
            'participantsSpeech' => $participantsSpeech,
        ]);
    }

    public function account()
    {
        if (auth()->user()->email == 'neo.debate') {
            $competitions = Competition::where('name', 'Debate')->get();
        } elseif (auth()->user()->email == 'neo.newscasting') {
            $competitions = Competition::where('name', 'Newscasting')->get();
        } elseif (auth()->user()->email == 'neo.ssw') {
            $competitions = Competition::where('name', 'Storytelling')->get();
        } elseif (auth()->user()->email == 'neo.speech') {
            $competitions = Competition::where('name', 'Speech')->get();
        } else {
            $competitions = Competition::all();
        }

        return view('participants.account', [
            'competitions' => $competitions,
        ]);
    }

    public function withdrawal()
    {
        if (auth()->user()->email == 'neo.debate') {
            $registrationDetails = RegistrationDetail::onlyTrashed()->whereRelation('competition', 'name', 'Debate')->get();
        } elseif (auth()->user()->email == 'neo.newscasting') {
            $registrationDetails = RegistrationDetail::onlyTrashed()->whereRelation('competition', 'name', 'Newscasting')->get();
        } elseif (auth()->user()->email == 'neo.ssw') {
            $registrationDetails = RegistrationDetail::onlyTrashed()->whereRelation('competition', 'name', 'Storytelling')->get();
        } elseif (auth()->user()->email == 'neo.speech') {
            $registrationDetails = RegistrationDetail::onlyTrashed()->whereRelation('competition', 'name', 'Speech')->get();
        } else {
            $registrationDetails = RegistrationDetail::onlyTrashed()->get();
        }

        return view('participants.withdrawal', [
            'registrationDetails' => $registrationDetails,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Participant $participant)
    {
        //
    }

    public function edit(Participant $participant)
    {
        return view('participants.edit', [
            'participant' => $participant,
            'provinces' => Province::all()
        ]);
    }

    public function update(Request $request, Participant $participant)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'gender' => 'required|string',
            'province' => 'required|string',
            'district' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'line_id' => 'required|string',
            'grade' => 'required|string',
            'institution' => 'required|string',
            'allergy' => 'required|string',
        ]);

        DB::transaction(function () use ($request, $participant) {
            if ($request->hasFile('vaccination')) {
                if ($participant->vaccination != NULL)
                    Storage::delete('public/images/vaccinations/' . $participant->vaccination);

                $extension = $request->file('vaccination')->getClientOriginalExtension();
                $proofNameToStore = $request->input('name') . '.' . $extension;
                $request->file('vaccination')->storeAs('public/images/vaccinations', $proofNameToStore);
            } else {
                $proofNameToStore = $participant->vaccination;
            }

            $participant->update([
                'name' => ucwords($request->name),
                'gender' => $request->gender,
                'grade' => $request->grade,
                'province_id' => $request->province,
                'district_id' => $request->district,
                'address' => $request->address,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'line_id' => $request->line_id,
                'institution' => $request->institution,
                'vaccination' => $proofNameToStore,
                'allergy' => $request->allergy,
            ]);

            if ((!str_contains($participant->grade, 'Year ') && $participant->binusian) || (str_contains($participant->grade, 'Year ') && !$request->binusian && $participant->binusian)) {
                $binusian = Binusian::where('participant_id', $participant->id);

                $binusian->delete();
            } elseif (str_contains($participant->grade, 'Year ') && $request->binusian && $participant->binusian) {
                $binusian = Binusian::where('participant_id', $participant->id);

                $binusian->update([
                    'nim' => $request->nim,
                    'region' => $request->region,
                    'faculty_id' => $request->faculty,
                    'major_id' => $request->major,
                ]);
            } elseif (str_contains($participant->grade, 'Year ') && $request->binusian) {
                Binusian::create([
                    'participant_id' => $participant->id,
                    'nim' => $request->nim,
                    'region' => $request->region,
                    'faculty_id' => $request->faculty,
                    'major_id' => $request->major,
                ]);
            }
        });

        return redirect()->route('participants.index')->with('success', 'Data successfully updated!');
    }

    public function destroy(Participant $participant)
    {
        //
    }

    public function export()
    {
        // return Excel::download(new ParticipantsExport, 'participant.xlsx');
    }

    public function sendAccountInfo(Participant $participant)
    {
        Mail::to($participant->email)->send(new AccountMail($participant));

        return redirect()->back()->with('success', 'Account info successfully sent.');
    }

    public function showLoginForm()
    {
        return view('auth.login-participant');
    }

    public function login()
    {
        return view('auth.login-participant');
    }

    protected function validateEnvironment($code)
    {
        $environment = Environment::where('code', $code)->first();

        return (Carbon::now() >= $environment->start_time  && Carbon::now() <= $environment->end_time) ? true : false;
    }

    public function showSubmissions()
    {
        return view('submissions.index');
    }
}
