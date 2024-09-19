<?php

namespace App\Http\Controllers;

use App\Models\DebateTeam;
use App\Http\Requests\StoreDebateTeamRequest;
use App\Http\Requests\UpdateDebateTeamRequest;

class DebateTeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('admin');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDebateTeamRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DebateTeam $debateTeam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DebateTeam $debateTeam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDebateTeamRequest $request, DebateTeam $debateTeam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DebateTeam $debateTeam)
    {
        //
    }
}
