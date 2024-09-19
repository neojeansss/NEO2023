<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = DB::table('events')
            ->select('id', 'speaker', 'date_open', 'date_close', 'description_content', 'link_register', 'picture', 'created_at', 'updated_at')
            ->get()
            ->toArray();

        return view('admin.events', [
            'events' => $events
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
            'speaker' => 'required|string',
            'date_open' => 'nullable|date',
            'date_close' => 'nullable|date',
            'description_content' => 'required|string',
            'link_register' => 'required|string',
            'picture' => 'image|mimes:jpeg,png,jpg|max:5000',
            'is_active' => 'boolean',
        ]);

        $id = DB::table('events')
                ->insertGetId($validatedData);

        $extension = $request
                        ->file('picture')
                        ->getClientOriginalExtension();

        $imageName = $id . '.' . $extension;

        $request
            ->file('picture')
            ->storeAs('public/non-static/events', $imageName);

        DB::table('events')
            ->where('id', $id)
            ->update(['picture' => $imageName]);

        return redirect()->route('events.index');
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
            'speaker' => 'required|string',
            'date_open' => 'nullable|date',
            'date_close' => 'nullable|date',
            'description_content' => 'required|string',
            'link_register' => 'required|string',
            'picture' => 'image|mimes:jpeg,png,jpg|max:5000',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
            $extension = $request
                            ->file('picture')
                            ->getClientOriginalExtension();

            $imageName = $id . '.' . $extension;

            $request->file('picture')
                ->storeAs('public/non-static/events', $imageName);
            $validatedData['picture'] = $imageName;

        } else {
            unset($validatedData['picture']);
        }
        DB::table('events')
            ->where('id','=', $id)
            ->update($validatedData);
        return redirect()->route('events.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = DB::table('events')
            ->where('id', '=', $id)
            ->get()
            ->first();
        if($data->picture){
            unlink(storage_path('app/public/non-static/events/'.$data->picture));
        }
        DB::table('events')
            ->where('id', '=', $id)
            ->delete();
        return redirect()->route('events.index');
    }
}
