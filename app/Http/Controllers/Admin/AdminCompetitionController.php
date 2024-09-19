<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCompetitionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $competitions = DB::table('competitions')
            ->select(['id', 'name', 'logo', 'early_price', 'early_quota', 'normal_price', 'total_quota', 'content', 'link_line_whatsapp', 'qr_code_whatsapp', 'ebooklet', 'is_active'])
            ->get()
            ->toArray();
        
        return view("admin.competitions", [
            'competitions' => $competitions
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
            'name' => 'required|string',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|nullable',
            'early_price' => 'integer|nullable',
            'early_quota' => 'integer|nullable',
            'normal_price' => 'integer|nullable',
            'normal_quota' => 'integer|nullable',
            'content' => 'string|nullable',
            'link_line_whatsapp' => 'string|nullable',
            'qr_code_whatsapp' => 'string|nullable',
            'e-booklet' => 'string|nullable',
            'is_active' => 'boolean',
        ]);

        $id = DB::table('competitions')
            ->insertGetId($validatedData);

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $extension = $request->file('logo')->getClientOriginalExtension();
            $imageName = $id . '.' . $extension;

            $request->file('logo')->storeAs('public/non-static/competitions', $imageName);

            DB::table('competitions')
                ->where('id', $id)
                ->update(['logo' => $imageName]);
        }

        return redirect()->route('competitions.index');
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
            'name' => 'required|string',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|nullable',
            'early_price' => 'integer|nullable',
            'early_quota' => 'integer|nullable',
            'normal_price' => 'integer|nullable',
            'normal_quota' => 'integer|nullable',
            'content' => 'string|nullable',
            'link_line_whatsapp' => 'string|nullable',
            'qr_code_whatsapp' => 'string|nullable',
            'e-booklet' => 'string|nullable',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $extension = $request->file('logo')->getClientOriginalExtension();
            $imageName = $id . '.' . $extension;

            $request->file('logo')->storeAs('public/non-static/competitions', $imageName);
            $validatedData['logo'] = $imageName;
        }

        DB::table('competitions')
            ->where('id', $id)
            ->update($validatedData);

        return redirect()->route('competitions.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DB::table('competitions')
            ->where('id', $id)
            ->get()
            ->first();

        if ($data->logo) {
            unlink(storage_path('app/public/non-static/competitions/' . $data->logo));
        }

        DB::table('competitions')
            ->where('id', $id)
            ->delete();

        return redirect()->route('competitions.index');
    }
}
