<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\DebateTeam;
use App\Models\Submission;
use App\Models\Competition;
use App\Models\Environment;
use App\Models\Participant;
use Illuminate\Http\Request;
use App\Models\Qualification;
use App\Models\RegistrationDetail;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\StoreSubmissionRequest;
use App\Http\Requests\UpdateSubmissionRequest;
use GuzzleHttp\Psr7\Request as Psr7Request;

class SubmissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('store');
        // $this->middleware('admin');
        // $this->middleware('access.control:submission');
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

        return view('submissions.index', [
            'rounds' => $rounds,
            'competitions' => $competitions,
            'qualifications' => $qualifications,
            'withDrawList' => $withDrawList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // dd($request);
        if (isset($request->debateTeam)) {
            return view('submissions.create', [
                'qualification_id' => $request->qualification_id,
                'debateTeam' => $request->debateTeam,
                'competition_name' => $request->competition_name,
                'round' => $request->round,
            ]);
        } elseif (isset($request->participant)) {
            return view('submissions.create', [
                'qualification_id' => $request->qualification_id,
                'participant' => $request->participant,
                'competition_name' => $request->competition_name,
                'round' => $request->round,
            ]);
        }

        return redirect()->back()->with('error', 'ERROR Request, Please contact our committee!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->competition_name == 'Debate') {
            if ($request->round == 1) {
                // dd($request);
                if (!$this->validateEnvironment('ENV006')) {
                    if (auth()->user() != null) {
                        dd("hai");
                        if (auth()->user()->role == 'ADMIN') {
                            return redirect()->route('submissions.index')->with('failed', 'Submission time has passed.');
                        }
                    } else {
                        dd("halo");
                        return redirect()->route('participant.dashboard')->with('failed', 'Submission time has passed.');
                    }
                }
            } elseif ($request->round == 3) {
                if (!$this->validateEnvironment('ENV007')) {
                    if (auth()->user() != null) {
                        if (auth()->user()->role == 'ADMIN') {
                            return redirect()->route('submissions.index')->with('failed', 'Submission time has passed.');
                        }
                    } else {
                        return redirect()->route('participant.dashboard')->with('failed', 'Submission time has passed.');
                    }
                }
            } elseif ($request->round == 4) {
                if (!$this->validateEnvironment('ENV008')) {
                    if (auth()->user() != null) {
                        if (auth()->user()->role == 'ADMIN') {
                            return redirect()->route('submissions.index')->with('failed', 'Submission time has passed.');
                        }
                    } else {
                        return redirect()->route('participant.dashboard')->with('failed', 'Submission time has passed.');
                    }
                }
            }
        } elseif ($request->competition_name == 'Newscasting') {
            if ($request->round == 1) {
                if (!$this->validateEnvironment('ENV012')) {
                    if (auth()->user() != null) {
                        if (auth()->user()->role == 'ADMIN') {
                            return redirect()->route('submissions.index')->with('failed', 'Submission time has passed.');
                        }
                    } else {
                        return redirect()->route('participant.dashboard')->with('failed', 'Submission time has passed.');
                    }
                }
            } elseif ($request->round == 3) {
                if (!$this->validateEnvironment('ENV013')) {
                    if (auth()->user() != null) {
                        if (auth()->user()->role == 'ADMIN') {
                            return redirect()->route('submissions.index')->with('failed', 'Submission time has passed.');
                        }
                    } else {
                        return redirect()->route('participant.dashboard')->with('failed', 'Submission time has passed.');
                    }
                }
            } elseif ($request->round == 4) {
                if (!$this->validateEnvironment('ENV014')) {
                    if (auth()->user() != null) {
                        if (auth()->user()->role == 'ADMIN') {
                            return redirect()->route('submissions.index')->with('failed', 'Submission time has passed.');
                        }
                    } else {
                        return redirect()->route('participant.dashboard')->with('failed', 'Submission time has passed.');
                    }
                }
            }
        } elseif ($request->competition_name == 'Storytelling') {

            if ($request->round == 1) {
                if (!$this->validateEnvironment('ENV003')) {
                    if (auth()->user() != null) {
                        if (auth()->user()->role == 'ADMIN') {
                            return redirect()->route('submissions.index')->with('failed', 'Submission time has passed.');
                        }
                    } else {
                        return redirect()->route('participant.dashboard')->with('failed', 'Submission time has passed.');
                    }
                }
            } elseif ($request->round == 3) {
                if (!$this->validateEnvironment('ENV004')) {
                    if (auth()->user() != null) {
                        if (auth()->user()->role == 'ADMIN') {
                            return redirect()->route('submissions.index')->with('failed', 'Submission time has passed.');
                        }
                    } else {
                        return redirect()->route('participant.dashboard')->with('failed', 'Submission time has passed.');
                    }
                }
            } elseif ($request->round == 4) {
                if (!$this->validateEnvironment('ENV005')) {
                    if (auth()->user() != null) {
                        if (auth()->user()->role == 'ADMIN') {
                            return redirect()->route('submissions.index')->with('failed', 'Submission time has passed.');
                        }
                    } else {
                        return redirect()->route('participant.dashboard')->with('failed', 'Submission time has passed.');
                    }
                }
            }
        } elseif ($request->competition_name == 'Speech') {

            if ($request->round == 1) {
                if (!$this->validateEnvironment('ENV009')) {
                    if (auth()->user() != null) {
                        if (auth()->user()->role == 'ADMIN') {
                            return redirect()->route('submissions.index')->with('failed', 'Submission time has passed.');
                        }
                    } else {
                        return redirect()->route('participant.dashboard')->with('failed', 'Submission time has passed.');
                    }
                }
            } elseif ($request->round == 3) {
                if (!$this->validateEnvironment('ENV010')) {
                    if (auth()->user() != null) {
                        if (auth()->user()->role == 'ADMIN') {
                            return redirect()->route('submissions.index')->with('failed', 'Submission time has passed.');
                        }
                    } else {
                        return redirect()->route('participant.dashboard')->with('failed', 'Submission time has passed.');
                    }
                }
            } elseif ($request->round == 4) {
                if (!$this->validateEnvironment('ENV011')) {
                    if (auth()->user() != null) {
                        if (auth()->user()->role == 'ADMIN') {
                            return redirect()->route('submissions.index')->with('failed', 'Submission time has passed.');
                        }
                    } else {
                        return redirect()->route('participant.dashboard')->with('failed', 'Submission time has passed.');
                    }
                }
            }
        } else {
            if (auth()->user() != null) {
                if (auth()->user()->role == 'ADMIN') {
                    return redirect()->route('submissions.index')->with('failed', 'There is something went wrong. Please contact the committee! 001');
                }
            } else {
                return redirect()->route('participant.dashboard')->with('failed', 'There is something went wrong. Please contact the committee! 001');
            }
        }
        // dd("tahap1");
        $request->validate([
            'qualification_id' => 'required',
            'file' => 'max:20480|file'
        ]);
        // dd("tahap2");
        $extension = $request->file('file')->getClientOriginalExtension();

        $proofNameToStore = null;
        if ($request->competition_name == 'Debate') {
            // dd("halo");
            if ($request->round == 1) {
                // dd("hai");
                if ($request->has('file')) {
                    $proofNameToStore = $request->debateTeam . '_' . $request->competition_name . '_Round' . 1 . '.' . $extension;
                    $request->file('file')->storeAs('public/submissions/debate/preliminary', $proofNameToStore);
                }
            } elseif ($request->round == 3) {
                if ($request->has('file')) {
                    $proofNameToStore = $request->debateTeam . '_' . $request->competition_name . '_Round' . 2 . '.' . $extension;
                    $request->file('file')->storeAs('public/submissions/debate/semifinal', $proofNameToStore);
                }
            } elseif ($request->round == 4) {
                if ($request->has('file')) {
                    $proofNameToStore = $request->debateTeam . '_' . $request->competition_name . '_Round' . 3 . '.' . $extension;
                    $request->file('file')->storeAs('public/submissions/debate/grandfinal', $proofNameToStore);
                }
            } else {
                if (auth()->user() != null) {
                    if (auth()->user()->role == 'ADMIN') {
                        return redirect()->route('submissions.index')->with('failed', 'There is something went wrong. Please contact the committee! 003');
                    }
                } else {
                    return redirect()->route('participant.dashboard')->with('failed', 'There is something went wrong. Please contact the committee! 003');
                }
            }
        } else {
            if ($request->round == 1) {
                if ($request->has('file')) {
                    $proofNameToStore = $request->file('file')->getClientOriginalName();
                    // $proofNameToStore = $request->participant . '_' . $request->competition_name . '_Round' . 1 . '.' . $extension;
                    $request->file('file')->storeAs('public/submissions/' . strtolower($request->competition_name) . '/preliminary', $proofNameToStore);
                }
            } elseif ($request->round == 3) {
                if ($request->has('file')) {
                    $proofNameToStore = $request->file('file')->getClientOriginalName();
                    // $proofNameToStore = $request->participant . '_' . $request->competition_name . '_Round' . 2 . '.' . $extension;
                    $request->file('file')->storeAs('public/submissions/' . strtolower($request->competition_name) . '/semifinal', $proofNameToStore);
                }
            } elseif ($request->round == 4) {
                if ($request->has('file')) {
                    $proofNameToStore = $request->file('file')->getClientOriginalName();
                    // $proofNameToStore = $request->participant . '_' . $request->competition_name . '_Round' . 3 . '.' . $extension;
                    $request->file('file')->storeAs('public/submissions/' . strtolower($request->competition_name) . '/grandfinal', $proofNameToStore);
                }
            } else {
                if (auth()->user() != null) {
                    if (auth()->user()->role == 'ADMIN') {
                        return redirect()->route('submissions.index')->with('failed', 'There is something went wrong. Please contact the committee! 004');
                    }
                } else {
                    return redirect()->route('participant.dashboard')->with('failed', 'There is something went wrong. Please contact the committee! 004');
                }
            }
        }
        // dd("tahap3");
        $submission = Submission::where('qualification_id', $request->qualification_id)->first();
        // dd($proofNameToStore, $submission, $request->qualification_id);
        if ($submission == null) {
            Submission::create([
                'qualification_id' => $request->qualification_id,
                'submission' => $proofNameToStore,
                'is_submit' => true,
            ]);
        } else {
            $submission->update([
                'submission' => $proofNameToStore,
                'is_submit' => true,
                'created_at' => time(),
            ]);
        }
        // dd("tahapakhir");
        if (auth()->user() != null) {
            if (auth()->user()->role == 'ADMIN') {
                return redirect()->route('submissions.index')->with('success', 'Your submission has been submitted successfully');
            }
        } else {
            return redirect()->route('participant.dashboard')->with('success', 'Your submission has been submitted successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Submission $submission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Submission $submission)
    {
        // return view('submissions.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Submission $submission)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Submission $submission)
    {
        //
    }

    public function download(Request $request, Submission $submission)
    {
        $round_name = null;
        if ($request->round == 1) {
            $round_name = 'preliminary';
        } elseif ($request->round == 2) {
            $round_name = '-';
        } elseif ($request->round == 3) {
            $round_name = 'semifinal';
        } elseif ($request->round == 4) {
            $round_name = 'grandfinal';
        }

        return response()->download(public_path('storage/submissions/' . strtolower($request->competition_name) . '/' . $round_name . '/' .  $submission->submission));
    }

    protected function validateEnvironment($code)
    {
        $environment = Environment::where('code', $code)->first();

        return (Carbon::now() >= $environment->start_time  && Carbon::now() <= $environment->end_time) ? true : false;
    }
}
