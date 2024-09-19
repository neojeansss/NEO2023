<?php

namespace App\Http\Controllers;

use App\Models\Testimony;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreTestimonyRequest;
use App\Http\Requests\UpdateTestimonyRequest;

class TestimonyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except('index');
        $this->middleware('access.control:testimony');
    }

    public function index()
    {
        return view('admin.testimonies.index', [
            'testimonies' => Testimony::all()
        ]);
    }

    public function create()
    {
        return view('admin.testimonies.create');
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);

        if ($request->hasFile('picture')) {
            $extension = $request->file('picture')->getClientOriginalExtension();
            $proofNameToStore = $request->input('name') . '.' . $extension;
            $request->file('picture')->storeAs('public/images/testimonies', $proofNameToStore);
        }

        Testimony::create([
            'name' => $request->name,
            'picture' => $proofNameToStore,
            'role' => $request->role,
            'message' => $request->message,
            'is_active' => 1
        ]);

        return redirect()->route('testimonies.index')->with('success', 'Data sucessfully added');
    }

    public function show(Testimony $testimony)
    {
        //
    }

    public function edit(Testimony $testimony)
    {
        return view('admin.testimonies.edit', [
            'testimony' => $testimony
        ]);
    }

    public function update(Request $request, Testimony $testimony)
    {
        // dd($request);
        $this->validateRequest($request);
        
        if ($request->hasFile('picture')) {
            if ($testimony->picture != NULL)
                Storage::delete('public/images/testimonies/' . $testimony->picture);
            
            $extension = $request->file('picture')->getClientOriginalExtension();
            $proofNameToStore = $request->input('name') . '.' . $extension;
            $request->file('picture')->storeAs('public/images/testimonies', $proofNameToStore);
        } else {
            $proofNameToStore = $testimony->picture;
        }

        $testimony->update([
            'name' => $request->name,
            'picture' => $proofNameToStore,
            'role' => $request->role,
            'message' => $request->message,
        ]);

        return redirect()->route('testimonies.index')->with('success', 'Data successfully updated!');
    }

    public function destroy(Testimony $testimony)
    {
        $testimony->delete();

        return redirect()->route('testimonies.index')->with('success', 'Data successfully deleted!');
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
