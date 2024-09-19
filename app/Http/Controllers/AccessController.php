<?php

namespace App\Http\Controllers;

use App\Models\Access;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAccessRequest;
use App\Http\Requests\UpdateAccessRequest;

class AccessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        $this->middleware('access.control:access');
    }
    
    public function index()
    {
        return view('admin.accesses.index',[
            'accesses' => Access::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.accesses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        Access::create([
            'name' => $request->name,
        ]);

        return redirect()->route('accesses.index')->with('success', 'Data sucessfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Access $access)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Access $access)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccessRequest $request, Access $access)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Access $access)
    {
        //
    }
}
