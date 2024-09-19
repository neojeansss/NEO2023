<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminManageMessageScController extends Controller {

    public function index(Request $request) {
        $result = DB::table('message_from_sc')
            ->selectRaw('id, name, role, message AS content, picture')
            ->get()
            ->toArray();
        return view('admin.message-from-sc', [
            'messages' => $result
        ]);
    }

    public function create() {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'role' => 'required|string',
            'message' => 'required|string',
            'picture' => 'image|mimes:jpeg,png,jpg|max:5000'
        ]);

        $id = DB::table('message_from_sc')
                ->insertGetId($validatedData);

        $extension = $request
                        ->file('picture')
                        ->getClientOriginalExtension();

        $imageName = $id . '.' . $extension;

        $request
            ->file('picture')
            ->storeAs('public/non-static/message-from-sc', $imageName);

        DB::table('message_from_sc')
            ->where('id', $id)
            ->update(['picture' => $imageName]);

        return redirect()->route('message-from-sc.index');
    }


    public function show(string $id) {
        return redirect()->route('message-from-sc.index');
    }

    public function edit(string $id) {
        //
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'string',
            'role' => 'string',
            'message' => 'string',
            'picture' => 'image|mimes:jpeg,png,jpg|max:5000'
        ]);

        if ($request->hasFile('picture') && $request->file('picture')->isValid()) {
            $extension = $request
                            ->file('picture')
                            ->getClientOriginalExtension();

            $imageName = $id . '.' . $extension;

            $request->file('picture')
                ->storeAs('public/non-static/message-from-sc', $imageName);
            $validatedData['picture'] = $imageName;

        } else {
            unset($validatedData['picture']);
        }
        DB::table('message_from_sc')
            ->where('id','=', $id)
            ->update($validatedData);
        return redirect()->route('message-from-sc.index');
    }

    public function destroy(string $id)
    {
        $data = DB::table('message_from_sc')
            ->where('id', '=', $id)
            ->get()
            ->first();
        if($data->picture){
            unlink(storage_path('app/public/non-static/message-from-sc/'.$data->picture));
        }
        DB::table('message_from_sc')
            ->where('id', '=', $id)
            ->delete();
        return redirect()->route('message-from-sc.index');
    }
}
