<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MessageFromSC;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMessageFromSCRequest;
use App\Http\Requests\UpdateMessageFromSCRequest;

class MessageFromSCController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except('index');
        // $this->middleware('access.control:message_from_sc');
    }
    public function index()
    {
        return view('admin.message_from_SC.index', [
            'message_from_SC' => MessageFromSC::all()
        ]);
    }

    public function create()
    {
        return view('admin.message_from_SC.create');
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);

        if ($request->hasFile('picture')) {
            $extension = $request->file('picture')->getClientOriginalExtension();
            $proofNameToStore = $request->input('name') . '.' . $extension;
            $request->file('picture')->storeAs('public/images/message_from_SC', $proofNameToStore);
        }
        $proofNameToStore = $request->input('name') . '.webp';

        MessageFromSC::create([
            'name' => $request->name,
            'picture' => $proofNameToStore,
            'role' => $request->role,
            'message' => $request->message,
            'is_active' => 1
        ]);

        return redirect()->route('message-from-SC.index')->with('success', 'Data sucessfully added');
    }

    public function show(MessageFromSC $message_from_sc)
    {
        //
    }

    public function edit(MessageFromSC $message_from_SC)
    {
        return view('admin.message_from_SC.edit', [
            'message_from_sc' => $message_from_SC
        ]);
    }

    public function update(Request $request, MessageFromSC $message_from_SC)
    {
        // dd($request, $message_from_SC);
        $this->validateRequest($request);
        
        if ($request->hasFile('picture')) {
            if ($message_from_SC->picture != NULL)
                Storage::delete('public/images/message_from_SC/' . $message_from_SC->picture);
            
            $extension = $request->file('picture')->getClientOriginalExtension();
            $proofNameToStore = $request->input('name') . '.' . $extension;
            $request->file('picture')->storeAs('public/images/message_from_SC', $proofNameToStore);
        } else {
            $proofNameToStore = $message_from_SC->picture;
        }

        $message_from_SC->update([
            'name' => $request->name,
            'picture' => $proofNameToStore,
            'role' => $request->role,
            'message' => $request->message,
        ]);

        return redirect()->route('message-from-SC.index')->with('success', 'Data successfully updated!');
    }

    public function destroy(MessageFromSC $message_from_SC)
    {
        $message_from_SC->delete();

        return redirect()->route('message-from-SC.index')->with('success', 'Data successfully deleted!');
    }

    protected function validateRequest(Request $request)
    {
        return $request->validate([
            'name'=> 'required|string',
            'picture' => 'image|mimes:jpg,png,jpeg',
            'role'=> 'required|string',
            'message'=> 'required|string',
        ]);
    }
}
