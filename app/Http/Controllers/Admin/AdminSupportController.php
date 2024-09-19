<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supports = DB::table('supports')
            ->select(['id', 'name', 'category', 'logo', 'is_active'])
            ->get()
            ->toArray();

        return view("admin.supports", [
            'supports' => $supports
        ]);
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
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'logo' => 'image|mimes:jpeg,png,jpg|max:5000|required',
        ]);

        $id = DB::table('supports')
            ->insertGetId($validatedData);

        $extension = $request
            ->file('logo')
            ->getClientOriginalExtension();

        $imageName = $id . '.' . $extension;

        $request
            ->file('logo')
            ->storeAs('public/non-static/supports', $imageName);

        DB::table('supports')
            ->where('id', $id)
            ->update(['logo' => $imageName]);

        return redirect()->route('supports.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'category' => 'required|string',
            'logo' => 'image|mimes:jpeg,png,jpg|max:5000', // Example validation for image upload
        ]);

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $extension = $request
                ->file('logo')
                ->getClientOriginalExtension();

            $imageName = $id . '.' . $extension;

            $request->file('logo')
                ->storeAs('public/non-static/supports', $imageName);
            $validatedData['logo'] = $imageName;

        } else {
            unset($validatedData['logo']);
        }
        DB::table('supports')
            ->where('id', '=', $id)
            ->update($validatedData);
        return redirect()->route('supports.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DB::table('supports')
            ->where('id', '=', $id)
            ->get()
            ->first();
        if ($data->logo) {
            unlink(storage_path('app/public/non-static/supports/' . $data->logo));
        }
        DB::table('supports')
            ->where('id', '=', $id)
            ->delete();
        return redirect()->route('supports.index');
    }
}
