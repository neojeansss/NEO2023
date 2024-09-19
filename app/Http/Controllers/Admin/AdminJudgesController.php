<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AdminJudgesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $judges = DB::table('judges')
            ->select(['id', 'name', 'role', 'message', 'picture', 'is_active'])
            ->get()
            ->toArray();

        return view("admin.judges", [
            'judges' => $judges
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
            'role' => 'required|string',
            'message' => 'required|string',
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:5000|required',
        ]);

        $id = DB::table('judges')
                ->insertGetId($validatedData);

        $extension = $request
                        ->file('picture')
                        ->getClientOriginalExtension();

        $imageName = $id . '.' . $extension;

        $request
            ->file('picture')
            ->storeAs('public/non-static/judges', $imageName);

        DB::table('judges')
            ->where('id', $id)
            ->update(['picture' => $imageName]);

        return redirect()->route('judges.index');
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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'role' => 'required|string',
            'message' => 'required|string',
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Example validation for image upload
        ]);

        if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
            $extension = $request
                            ->file('picture')
                            ->getClientOriginalExtension();

            $imageName = $id . '.' . $extension;

            $request->file('picture')
                ->storeAs('public/non-static/judges', $imageName);
            $validatedData['picture'] = $imageName;

        } else {
            unset($validatedData['picture']);
        }
        DB::table('judges')
            ->where('id','=', $id)
            ->update($validatedData);
        return redirect()->route('judges.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DB::table('judges')
            ->where('id', '=', $id)
            ->get()
            ->first();
        if($data->picture){
            unlink(storage_path('app/public/non-static/judges/'.$data->picture));
        }
        DB::table('judges')
            ->where('id', '=', $id)
            ->delete();
        return redirect()->route('judges.index');
    }
}
