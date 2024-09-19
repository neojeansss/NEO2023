<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except('index');
        // $this->middleware('access.control:event');
    }
    public function index()
    {
        return view('admin.events.index', [
            'events' => Event::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validateRequest($request);

        if ($request->hasFile('logo')) {
            $extension = $request->file('logo')->getClientOriginalExtension();
            $proofNameToStore = $request->input('name') . '.' . $extension;
            $request->file('logo')->storeAs('public/images/events', $proofNameToStore);
        }

        Event::create([
            'name' => $request->name,
            'category' => $request->category,
            'logo' => $proofNameToStore
        ]);

        return redirect()->route('events.index')->with('success', 'Data sucessfully added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit', [
            'event' => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $this->validateRequest($request);

        if ($request->hasFile('logo')) {
            if ($event->logo != NULL)
                Storage::delete('public/images/events/' . $event->logo);
            
            $extension = $request->file('logo')->getClientOriginalExtension();
            $proofNameToStore = $request->input('name') . '.' . $extension;
            $request->file('logo')->storeAs('public/images/events', $proofNameToStore);
        } else {
            $proofNameToStore = $event->logo;
        }

        $event->update([
            'name' => $request->name,
            'category' => $request->category,
            'logo' => $proofNameToStore
        ]);

        return redirect()->route('events.index')->with('success', 'Data successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Data successfully deleted!');
    }

    protected function validateRequest(Request $request)
    {
        return $request->validate([
            'name' => 'required|string',
            'speaker' => 'required|string',
            'date_open' => 'required|date',
            'date_close' => 'required|date',
            'description_content' => 'required|string',
            'link_register' => 'required|string',
            'picture' => 'image|mimes:jpg,png,jpeg',
        ]);
    }
}
