<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Competition;
use Illuminate\Http\Request;
use App\Http\Requests\StoreScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;

class ScheduleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    public function index()
    {
        return view('schedules.index', [
            'schedules' => Schedule::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(
            'schedules.create',
            ['competitions' => Competition::all(),]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'competition_id' => 'required|integer',
            'name' => 'required|string',
            'description' => 'string',
            'location' => 'required|string',
        ]);

        Schedule::create([
            'competition_id' => $request->competition_id,
            'name' => $request->name,
            'description' => $request->description,
            'date' => $request->date,
            'from' => $request->from,
            'to' => $request->to,
            'location' => $request->location,
            'is_active' => true,
        ]);

        return redirect()->route('schedules.index')->with('success', 'Your schedule have been created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Schedule $schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Schedule $schedule)
    {
        return view(
            'schedules.edit',
            ['schedule' => $schedule,
            'competitions' => Competition::all(),]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'competition_id' => 'required|integer',
            'name' => 'required|string',
            'description' => 'string',
            'location' => 'required|string',
        ]);

        $schedule->update([
            'competition_id' => $request->competition_id,
            'name' => $request->name,
            'description' => $request->description,
            'date' => $request->date,
            'from' => $request->from,
            'to' => $request->to,
            'location' => $request->location,
        ]);

        return redirect()->route('schedules.index')->with('success', 'Your schedule have been edited!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()->route('schedules.index')->with('success', 'Your schedule have been deleted!');
    }
}
