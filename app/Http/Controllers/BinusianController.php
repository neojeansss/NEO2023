<?php

namespace App\Http\Controllers;

use App\Models\Binusian;
use App\Http\Requests\StoreBinusianRequest;
use App\Http\Requests\UpdateBinusianRequest;

class BinusianController extends Controller
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
    public function store(StoreBinusianRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Binusian $binusian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Binusian $binusian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBinusianRequest $request, Binusian $binusian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Binusian $binusian)
    {
        //
    }
}
