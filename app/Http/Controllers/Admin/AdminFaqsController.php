<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminFaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = DB::table('faqs')
            ->select([
            'id',
            'category',
            'sub_category',
            'title',
            'description',
            'is_active',
            ])
            ->get()
            ->toArray();

        return view("admin.faqs", [
            'faqs' => $faqs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category' => 'required|string',
            'sub_category' => 'nullable|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'is_active' => 'boolean',
        ]);

        $id = DB::table('faqs')
            ->insertGetId($validatedData);

        return redirect()->route('faqs.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'category' => 'required|string',
            'sub_category' => 'nullable|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'is_active' => 'boolean',
        ]);

        DB::table('faqs')
            ->where('id', $id)
            ->update($validatedData);

        return redirect()->route('faqs.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('faqs')
            ->where('id', $id)
            ->delete();

        return redirect()->route('faqs.index');
    }
}
