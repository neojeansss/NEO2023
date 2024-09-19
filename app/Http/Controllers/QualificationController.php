<?php

namespace App\Http\Controllers;

use Nette\Utils\ArrayList;
use App\Models\Competition;
use Illuminate\Http\Request;
use App\Models\Qualification;
use App\Models\RegistrationDetail;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\StoreQualificationRequest;
use App\Http\Requests\UpdateQualificationRequest;

class QualificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        // $this->middleware('access.control:qualification');
    }

    public function index()
    {
        $rounds = array(
            [
                'id' => 1,
                'name' => 'Preliminary'
            ],
            [
                'id' => 2,
                'name' => '-'
            ],
            [
                'id' => 3,
                'name' => 'Semifinal'
            ],
            [
                'id' => 4,
                'name' => 'Grand Final'
            ],
        );

        if (auth()->user()->email == 'neo.debate') {
            $competitions = Competition::where('name', 'Debate')->get();
        } elseif (auth()->user()->email == 'neo.newscasting') {
            $competitions = Competition::where('name', 'Newscasting')->get();
        } elseif (auth()->user()->email == 'neo.storytelling') {
            $competitions = Competition::where('name', 'Storytelling')->get();
        } elseif (auth()->user()->email == 'neo.speech') {
            $competitions = Competition::where('name', 'Speech')->get();
        } else {
            $competitions = Competition::all();
        }

        $qualifications = [];

        for ($i = 0; $i < 4; $i++) {
            foreach ($competitions as $competition) {
                $temp = Qualification::where('rank', $rounds[$i]['id'])
                    ->whereRelation('registrationDetail', 'competition_id', $competition->id)->get();

                $qualifications[$rounds[$i]['id']][$competition->id] =  $temp;
            }
        }

        $withDrawList = RegistrationDetail::whereHas('verifiedPayment')
            ->whereHas('qualifications', function (Builder $query) {
                $query->where('qualifications.rank', 0);
            })->get();

        // dd($competitions,$qualifications);

        return view('admin.qualifications.index', [
            'rounds' => $rounds,
            'competitions' => $competitions,
            'qualifications' => $qualifications,
            'withDrawList' => $withDrawList,
        ]);
    }

    public function create($round, Competition $competition)
    {
        // dd((int)$round,$competition);

        $rounds = array(
            [
                'id' => 1,
                'name' => 'Preliminary'
            ],
            [
                'id' => 2,
                'name' => '-'
            ],
            [
                'id' => 3,
                'name' => 'Semifinal'
            ],
            [
                'id' => 4,
                'name' => 'Grand Final'
            ],
        );

        if ($round == 1) {
            $registrationDetails = RegistrationDetail::whereHas('verifiedPayment')
                ->where('competition_id', $competition->id)
                ->get();
        } else {
            $registrationDetails = RegistrationDetail::whereHas('verifiedPayment')
                ->whereHas('qualifications', function (Builder $query) use ($round) {
                    $query->where('qualifications.rank', $round - 1);
                })->where('competition_id', $competition->id)
                ->get();
        }
        // dd($registrationDetails);

        return view('admin.qualifications.create', [
            'round' => $rounds[$round - 1],
            'competition' => $competition,
            'registrationDetails' => $registrationDetails
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'rank' => 'required|integer',
            'registration_detail_id.*' => 'required|integer'
        ]);

        $data = [];

        for ($i = 0; $i < count($request->registration_detail_id); $i++) {
            $data[] = [
                'rank' => $request->rank,
                'registration_detail_id' => $request->registration_detail_id[$i]
            ];
        }

        Qualification::insert($data);

        return redirect()->route('qualifications.index')->with('success', 'Data sucessfully added');
    }

    public function show(Qualification $qualification)
    {
        //
    }

    public function editRank($round, Competition $competition)
    {
        // dd($round, $competition);
        $rounds = array(
            [
                'id' => 1,
                'name' => 'Preliminary'
            ],
            [
                'id' => 2,
                'name' => '-'
            ],
            [
                'id' => 3,
                'name' => 'Semifinal'
            ],
            [
                'id' => 4,
                'name' => 'Grand Final'
            ],
        );
        if ($round == 1) {
            $registrationDetails = RegistrationDetail::whereHas('verifiedPayment')
                ->where('competition_id', $competition->id)
                ->get();
        } else {
            // if ($competition->name == 'Debate') {
            //     $registrationDetails = RegistrationDetail::whereHas('verifiedPayment')
            //         ->whereHas('qualifications', function (Builder $query) use ($round) {
            //             $query->where('qualifications.rank', $round - 1);
            //         })->where('competition_id', $competition->id)
            //         ->get();
            // } else {
                if ($round == 3) {
                    $registrationDetails = RegistrationDetail::whereHas('verifiedPayment')
                        ->whereHas('qualifications', function (Builder $query) use ($round) {
                            $query->where('qualifications.rank', $round - 2);
                        })->where('competition_id', $competition->id)
                        ->get();
                } elseif ($round == 4) {
                    $registrationDetails = RegistrationDetail::whereHas('verifiedPayment')
                        ->whereHas('qualifications', function (Builder $query) use ($round) {
                            $query->where('qualifications.rank', $round - 1);
                        })->where('competition_id', $competition->id)
                        ->get();
                }
            // }
        }
        // dd($registrationDetails);

        return view('admin.qualifications.edit', [
            'round' => $rounds[$round - 1],
            'competition' => $competition,
            'registrationDetails' => $registrationDetails
        ]);
    }

    public function updateRank(Request $request)
    {
        // dd($request);
        $request->validate([
            'rank' => 'required|integer',
            'registration_detail_id.*' => 'required|integer'
        ]);

        $data = [];

        for ($i = 0; $i < count($request->registration_detail_id); $i++) {
            $qualification = Qualification::where('registration_detail_id', $request->registration_detail_id[$i])->first();
            $qualification->update([
                'rank' => $request->rank,
            ]);
            if (isset($qualification->submission)) {
                $qualification->submission->update([
                    'is_submit' => false,
                    'created_at' => null,
                ]);
            }
        }

        return redirect()->route('qualifications.index')->with('success', 'Data sucessfully added');
    }

    public function backRank(Qualification $qualification, $round)
    {
        $qualification->update([
            'rank' => $round,
        ]);

        return redirect()->route('qualifications.index')->with('success', 'Data sucessfully updated');
    }

    public function destroy(Qualification $qualification)
    {
        $qualification->delete();

        return redirect()->back();
    }
}
