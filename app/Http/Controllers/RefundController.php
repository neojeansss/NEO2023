<?php

namespace App\Http\Controllers;

use App\Models\Refund;
use App\Http\Requests\StoreRefundRequest;
use App\Http\Requests\UpdateRefundRequest;

class RefundController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        // $this->middleware('access.control:refund');
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
    public function store(StoreRefundRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Refund $refund)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Refund $refund)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRefundRequest $request, Refund $refund)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Refund $refund)
    {
        //
    }
}
