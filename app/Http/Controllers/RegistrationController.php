<?php

namespace App\Http\Controllers;

use stdClass;
use Carbon\Carbon;
use App\Models\Refund;
use App\Models\Binusian;
use App\Models\District;
use App\Models\Province;
use App\Models\Companion;
use App\Models\DebateTeam;
use App\Models\Competition;
use App\Models\Environment;
use App\Models\Participant;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\RegistrationDetail;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\StoreRegistrationRequest;
use App\Http\Requests\UpdateRegistrationRequest;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['user'])->except('manage', 'destroy');
        $this->middleware(['admin'])->only('manage', 'destroy');
        $this->middleware('access.control:registration')->only('manage', 'destroy');
    }


    public function index()
    {
        $registrations = Registration::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
        $competitionSummaries = [];

        foreach ($registrations as $registration) {
            $competitions = DB::table('competitions')
                ->join('registration_details', 'competitions.id', 'registration_details.competition_id')
                ->select('competitions.name', 'registration_details.price', DB::raw('count(*) as registrations_count'))
                ->where('registration_details.registration_id', $registration->id)
                ->groupBy('competitions.name', 'registration_details.price')
                ->get();

            $competitionSummaries[$registration->id] = $competitions;
        }

        return view('registrations.index', [
            'registrations' => $registrations,
            'competitionSummaries' => $competitionSummaries,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        if (!$this->validateEnvironment('ENV001')) {
            return redirect()->back()->with('error', 'Registration Closed');
        }

        $competitions = Competition::all();
        $schema = $competitions
            ->map(fn ($e) => $e->name)
            ->reduce(fn ($arr, $v, $_) => array_merge($arr, [$v => 'required|integer']), []);
        $data = $request->validate($schema);
        $ticketsRequested = collect(array_keys($data))
            ->map(function ($competitionName) use ($data, $competitions): stdClass {
                $obj = new stdClass;
                $obj->competitionName = $competitionName;
                $obj->quantity = $data[$competitionName];
                // TODO: EARLY BIRD SUPPORT PENDING
                if($this->validateEnvironment('ENV002')){
                    $obj->unitPrice = $competitions->where('name', '=', $competitionName)->first()->early_price;
                }else{
                    $obj->unitPrice = $competitions->where('name', '=', $competitionName)->first()->normal_price;
                }
                
                return $obj;
            })
            ->filter(fn ($e) => $e->quantity > 0);
        $totalPrice = $ticketsRequested->reduce(fn ($sum, $e) => $sum + ($e->quantity * $e->unitPrice));

        // dd($ticketsRequested->toArray(),$totalPrice, Province::all());
        return view('dashboards.user.fill-form', [
            'tickets' => $ticketsRequested->toArray(),
            'totalPrice' => $totalPrice,
            'provinces' => Province::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!$this->validateEnvironment('ENV001')) {
            return redirect()->back()->with('error', 'Registration Closed');
        }

        $this->validate($request, [
            'allergy.*' => 'string',

            'participant_name.*' => 'required|string',
            'participant_email.*' => 'required',
            'participant_gender.*' => 'required|string',
            'participant_phone.*' => 'required|string',

            'address_provinceID.*' => 'required|string',
            'address_districtID.*' => 'required|string',
            'address_fullname.*' => 'required|string',

            'grade.*' => 'required|string',
            'university_name.*' => 'required|string',

        ]);
        // dd($request);
        $registration = DB::transaction(function () use ($request) {
            $registration_time  = Environment::where('code', 'ENV001')->first();

            //tickets
            $tickets_decode = json_decode($request->tickets);
            $tickets = Collection::make($tickets_decode);

            // competitions
            $competitions = Competition::withCount(['registrations', 'earlyRegistrations' => function (Builder $query) {
                $query->where('payment_due', '>=', Carbon::now())->orWhereHas('payment');
            }])->get();
            // dd($tickets, $competitions);

            // set type
            $isEarlyBirdOngoing = $this->validateEnvironment('ENV002');
            $type = 'NORMAL';

            if ($isEarlyBirdOngoing == true) {
                $type = 'EARLY';
            } else {
                $type = 'NORMAL';
            }

            // SET PAYMENT DUE
            if (strtotime(Carbon::now()->addHours(5)) > strtotime($registration_time->end_time)) {
                $diff = round((strtotime($registration_time->end_time) - strtotime(Carbon::now())) / 60);
                $payment_due = Carbon::now()->addMinutes($diff);
            } else {
                $payment_due = Carbon::now()->addHours(5);
            }

            $registration = Registration::create([
                'user_id' => auth()->user()->id,
                'payment_due' => $payment_due,
            ]);

            if ($request->has('companion_name')) {
                if (isset($request->companion_name) == true) {
                    Companion::create([
                        'registration_id' => $registration->id,
                        'name' => $request->companion_name,
                        'phone_number' => $request->companion_phone
                    ]);
                }
            }

            foreach ($competitions as $competition) {
                $quantity = 0;
                foreach ($tickets as $ticket) {
                    if ($ticket->competitionName == $competition->name) {
                        $quantity = $ticket->quantity;
                        break;
                    }
                }

                $price = 0;
                if ($type == 'EARLY') {
                    $price = $competition->early_price;
                } else {
                    $price = $competition->normal_price;
                }

                if ($quantity > 0) {
                    // VALIDATE TICKET
                    if ($this->validateTicket($competition, $type, $quantity) == false)
                        return redirect()->route('dashboard')->with('failed', 'Tickets are sold out!');

                    for ($i = 0; $i < $quantity; $i++) {

                        $registrationDetail = RegistrationDetail::create([
                            'registration_id' => $registration->id,
                            'competition_id' => $competition->id,
                            'type' => $type,
                            'price' => $price,
                        ]);

                        if ($competition->name == 'Debate') {
                            DebateTeam::create([
                                'registration_detail_id' => $registrationDetail->id,
                                'team_name' => $request->debate_team_name[$i + 1]
                            ]);
                        }

                        if ($competition->name == 'Debate') {
                            for ($speaker = 1; $speaker <= 2; $speaker++) {
                                if ($request->binusian_nim[$competition->name . '-' . $i + 1 . '-' . $speaker] == null && $request->binusian_region[$competition->name . '-' . $i + 1 . '-' . $speaker] == null) {
                                    $institution = $request->university_name[$competition->name . '-' . $i + 1 . '-' . $speaker];
                                } else {
                                    $institution = $request->binusian_name[$competition->name . '-' . $i + 1 . '-' . $speaker];
                                }
                                $province = Province::find($request->address_provinceID[$competition->name . '-' . $i + 1 . '-' . $speaker]);
                                $district = District::find($request->address_disctrictID[$competition->name . '-' . $i + 1 . '-' . $speaker]);
                                $participant = Participant::create([
                                    'name' => ucwords($request->participant_name[$competition->name . '-' . $i + 1 . '-' . $speaker]),
                                    'registration_detail_id' => $registrationDetail->id,
                                    'gender' => $request->participant_gender[$competition->name . '-' . $i + 1 . '-' . $speaker],
                                    'email' => $request->participant_email[$competition->name . '-' . $i + 1 . '-' . $speaker],
                                    'phone_number' => $request->participant_phone[$competition->name . '-' . $i + 1 . '-' . $speaker],

                                    'university_year' => $request->grade[$competition->name . '-' . $i + 1 . '-' . $speaker],

                                    'province' => $province->name,
                                    'district' => $district->name,
                                    'address' => $request->address_fullname[$competition->name . '-' . $i + 1 . '-' . $speaker],

                                    'institution' => $institution,
                                    'allergy' => $request->allergy[$competition->name . '-' . $i + 1 . '-' . $speaker],
                                    'level' => 1,
                                ]);
                                if ($participant->institution == 'Bina Nusantara University') {
                                    Binusian::create([
                                        'participant_id' => $participant->id,
                                        'nim' => $request->binusian_nim[$competition->name . '-' . $i + 1 . '-' . $speaker],
                                        'region' => $request->binusian_region[$competition->name . '-' . $i + 1 . '-' . $speaker],
                                        'faculty' => $request->binusian_faculty[$competition->name . '-' . $i + 1 . '-' . $speaker],
                                        'major' => $request->binusian_major[$competition->name . '-' . $i + 1 . '-' . $speaker],
                                    ]);
                                }
                            }
                        } else {
                            $province = Province::find($request->address_provinceID[$competition->name . '-' . $i + 1]);
                            $district = District::find($request->address_disctrictID[$competition->name . '-' . $i + 1]);
                            if ($request->binusian_nim[$competition->name . '-' . $i + 1] == null && $request->binusian_region[$competition->name . '-' . $i + 1] == null) {
                                $institution = $request->university_name[$competition->name . '-' . $i + 1];
                            } else {
                                $institution = $request->binusian_name[$competition->name . '-' . $i + 1];
                            }
                            $participant = Participant::create([
                                'name' => ucwords($request->participant_name[$competition->name . '-' . $i + 1]),
                                'registration_detail_id' => $registrationDetail->id,
                                'gender' => $request->participant_gender[$competition->name . '-' . $i + 1],
                                'email' => $request->participant_email[$competition->name . '-' . $i + 1],
                                'phone_number' => $request->participant_phone[$competition->name . '-' . $i + 1],

                                'university_year' => $request->grade[$competition->name . '-' . $i + 1],

                                'province' => $province->name,
                                'district' => $district->name,
                                'address' => $request->address_fullname[$competition->name . '-' . $i + 1],

                                'institution' => $institution,
                                'allergy' => $request->allergy[$competition->name . '-' . $i + 1],
                                'level' => 1,
                            ]);
                            if ($participant->institution == 'Bina Nusantara University') {
                                Binusian::create([
                                    'participant_id' => $participant->id,
                                    'nim' => $request->binusian_nim[$competition->name . '-' . $i + 1],
                                    'region' => $request->binusian_region[$competition->name . '-' . $i + 1],
                                    'faculty' => $request->binusian_faculty[$competition->name . '-' . $i + 1],
                                    'major' => $request->binusian_major[$competition->name . '-' . $i + 1],
                                ]);
                            }
                        }
                    }
                }
            }

            return $registration;
        });

        return redirect()->route('payments.create', $registration);
    }

    /**
     * Display the specified resource.
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRegistrationRequest $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration)
    {
        $registration->delete();

        return redirect()->back()->with('success', 'Data successfully deleted!');
    }

    public function manage()
    {
        $registrations = Registration::all();
        $competitionSummaries = [];

        foreach ($registrations as $registration) {
            $competitions = DB::table('competitions')
                ->join('registration_details', 'competitions.id', 'registration_details.competition_id')
                ->select('competitions.name', 'registration_details.price', DB::raw('count(*) as registrations_count'))
                ->where('registration_details.registration_id', $registration->id)
                ->groupBy('competitions.name', 'registration_details.price')
                ->get();

            $competitionSummaries[$registration->id] = $competitions;
        }

        return view('admin.registrations.manage', [
            'unverifiedRegistrations' => Registration::whereRelation('payment', 'is_verified', 'pending')->orderBy('created_at', 'DESC')->get(),
            'pendingPayments' => Registration::doesntHave('payment')->where('payment_due', '>=', Carbon::now())->orderBy('created_at', 'DESC')->get(),
            'verifiedRegistrations' => Registration::whereRelation('payment', 'is_verified', 'accepted')->orderBy('created_at', 'DESC')->get(),
            'expiredRegistrations' => Registration::doesntHave('payment')->where('payment_due', '<', Carbon::now())->orderBy('created_at', 'DESC')->get(),
            // 'refunds' => Refund::withTrashed()->orderBy('created_at', 'DESC')->get(),
            // 'newRefund' => Refund::where('is_verified', null)->count(),
            'competitionSummaries' => $competitionSummaries,
        ]);
    }

    public function emailAddressIsTaken(Request $request) {
        $data = $request->validate([
            "emailAddress" => "string|required"
        ]);

        $emailIsTaken = Participant::where('email', $data["emailAddress"])->first() != null;

        return response()->json([
            "valid" => $emailIsTaken
        ]);
    }

    function validateTicket($competition, $type, $totalTicket)
    {
        if ($type != 'NORMAL') {
            // CHECK TICKET AVAILABILITY                            
            // $remainingQuota = $competition->early_quota - $competition->early_registrations_count;
            $remainingQuota = $competition->total_quota - $competition->total_registrations_count;

            if ($totalTicket > $remainingQuota) return false;
        } else {
            // CHECK TICKET AVAILABILITY
            $remainingQuota = $competition->total_quota - $competition->registrations_count;

            if ($totalTicket > $remainingQuota) return false;
        }
        return true;
    }

    protected function validateEnvironment($code)
    {
        $environment = Environment::where('code', $code)->first();

        return (Carbon::now() >= $environment->start_time  && Carbon::now() <= $environment->end_time) ? true : false;
    }
}
