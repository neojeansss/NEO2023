<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Submission;
use App\Models\Competition;
use App\Models\Environment;
use App\Models\Participant;
use App\Models\Registration;
use Illuminate\Http\Request;
use App\Models\Qualification;
use App\Models\RequestInvitation;
use App\Models\RegistrationDetail;
use Illuminate\Database\Eloquent\Builder;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function check()
    {
        if (auth()->user()->role == 'USER') {
            $competitions = Competition::withCount(['registrations', 'earlyRegistrations', 'normalRegistrations' => function (Builder $query) {
                $query->where('payment_due', '>=', Carbon::now())
                    ->orWhereHas('payment');
            }])->get();

            return view('dashboards.user.select-competition', [
                'competitions' => $competitions,
                'isRegistrationOngoing' => $this->validateEnvironment('ENV001'),
                'isEarlyBirdOngoing' => $this->validateEnvironment('ENV002'),
                'environment_early' => Environment::where('code', 'ENV002')->first(),
                'bannerAccomodation' => $this->validateEnvironment('ENV016'),
            ]);
        } else {

            // $competitions = Competition::withCount(['normalRegistrations', 'earlyRegistrations' => function (Builder $query) {
            //     $query->where('payment_due', '>=', Carbon::now())
            //         ->orWhereHas('payment');
            // }])->get();

            $competitions = Competition::all();

            

            $participantsDebate = Participant::whereHas('registrationDetail', function($query){
                $query->whereRelation('competition','name', 'Debate')->whereHas('verifiedPayment')->whereHas('debateTeam');
            })->get();
            $participantsNewscasting = Participant::whereHas('registrationDetail', function($query){
                $query->whereRelation('competition','name', 'Newscasting')->whereHas('verifiedPayment');
            })->get();
            $participantsStorytelling = Participant::whereHas('registrationDetail', function($query){
                $query->whereRelation('competition','name', 'Storytelling')->whereHas('verifiedPayment');
            })->get();
            $participantsSpeech = Participant::whereHas('registrationDetail', function($query){
                $query->whereRelation('competition','name', 'Speech')->whereHas('verifiedPayment');
            })->get();

            $totalParticipant = (($participantsDebate->count())/2) + $participantsNewscasting->count() + $participantsStorytelling->count() + $participantsSpeech->count();


            // dd($competitions, Competition::wsith(['normalRegistrations', 'earlyRegistrations'])->get(), Qualification::all());
            // dd(RegistrationDetail::whereHas('verifiedPayment')->get());
            return view('dashboards.admin', [
                'unverifiedCount' => Registration::whereRelation('payment', 'is_verified', 'pending')->count(),
                // 'refundCount' => Refund::where('is_verified', null)->count(),
                'totalParticipant' => $totalParticipant,

                'submissionCount' => Submission::all()->count(),
                'competitions' => $competitions,
            'participantsDebate' => $participantsDebate,
            'participantsNewscasting' => $participantsNewscasting,
            'participantsStorytelling' => $participantsStorytelling,
            'participantsSpeech' => $participantsSpeech,
                'environments' => Environment::all(),
                'requestCount' => RequestInvitation::where('is_sent', null)->count(),
            ]);
        }
    }

    protected function validateEnvironment($code)
    {
        $environment = Environment::where('code', $code)->first();
        if ($environment == null) {
            return redirect()->back();
        }

        return (Carbon::now() >= $environment->start_time  && Carbon::now() <= $environment->end_time) ? true : false;
    }
}
