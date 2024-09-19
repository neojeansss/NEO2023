<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Access;
use Illuminate\Http\Request;
use App\Models\AccessControl;
use App\Http\Requests\StoreAccessControlRequest;
use App\Http\Requests\UpdateAccessControlRequest;

class AccessControlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('access.control:access_control');
    }

    public function index()
    {
        return view('admin.access-controls.index', [
            'accessControls' => AccessControl::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.access-controls.create', [
            'accesses' => Access::all(),
            'users' => User::where('role', '!=', 'USER')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'access_id' => 'required|integer',
            'user_id' => 'required|integer'
        ]);

        AccessControl::create([
            'access_id' => $request->access_id,
            'user_id' => $request->user_id
        ]);

        return redirect()->route('access-controls.index')->with('success', 'Data sucessfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(AccessControl $accessControl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AccessControl $accessControl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccessControlRequest $request, AccessControl $accessControl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AccessControl $accessControl)
    {
        //
    }
}
