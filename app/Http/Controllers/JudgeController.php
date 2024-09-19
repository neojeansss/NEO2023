<?php

namespace App\Http\Controllers;

use App\Models\Judge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreJudgeRequest;
use App\Http\Requests\UpdateJudgeRequest;

class JudgeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->except('index');
        // $this->middleware('access.control:judge');
    }
    public function index()
    {
        return view('admin.judges.index', [
            'judges' => Judge::all()
        ]);
    }

    public function create()
    {
        return view('admin.judges.create');
    }

    public function store(Request $request)
    {
        $this->validateRequest($request);

        if ($request->hasFile('picture')) {
            $extension = $request->file('picture')->getClientOriginalExtension();
            $proofNameToStore = $request->input('name') . '.' . $extension;
            $request->file('picture')->storeAs('public/images/judges', $proofNameToStore);
        }

        Judge::create([
            'name' => $request->name,
            'picture' => $proofNameToStore,
            'role' => $request->role,
            'message' => $request->message,
            'is_active' => 1
        ]);

        return redirect()->route('judges.index')->with('success', 'Data sucessfully added');
    }

    public function show(Judge $judge)
    {
        //
    }

    public function edit(Judge $judge)
    {
        return view('admin.judges.edit', [
            'judge' => $judge
        ]);
    }

    public function update(Request $request, Judge $judge)
    {
        // dd($request);
        $this->validateRequest($request);
        
        if ($request->hasFile('picture')) {
            if ($judge->picture != NULL)
                Storage::delete('public/images/judges/' . $judge->picture);
            
            $extension = $request->file('picture')->getClientOriginalExtension();
            $proofNameToStore = $request->input('name') . '.' . $extension;
            $request->file('picture')->storeAs('public/images/judges', $proofNameToStore);
        } else {
            $proofNameToStore = $judge->picture;
        }

        $judge->update([
            'name' => $request->name,
            'picture' => $proofNameToStore,
            'role' => $request->role,
            'message' => $request->message,
        ]);

        return redirect()->route('judges.index')->with('success', 'Data successfully updated!');
    }

    public function destroy(Judge $judge)
    {
        $judge->delete();

        return redirect()->route('judges.index')->with('success', 'Data successfully deleted!');
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
