<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminRequestInvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requestInvitations = DB::table('request_invitations')
            ->select(['id', 'name', 'email', 'institution', 'is_sent'])
            ->get()
            ->toArray();

        return view('admin.request-invitations', [
            'requestInvitations' => $requestInvitations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show the create view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'institution' => 'required|string',
            'is_sent' => 'boolean',
        ]);

        DB::table('request_invitations')
            ->insertGetId($validatedData);
        return redirect()->route('request-invitations.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Show the edit view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'institution' => 'required|string',
            'is_sent' => 'boolean',
        ]);

        DB::table('request_invitations')
            ->where('id', $id)
            ->update($validatedData);

        return redirect()->route('request-invitations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('request_invitations')
            ->where('id', '=', $id)
            ->delete();

        return redirect()->route('request-invitations.index');
    }
}
