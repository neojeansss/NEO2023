<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Competition;
use App\Models\Environment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\StoreCompetitionRequest;
use App\Http\Requests\UpdateCompetitionRequest;

class CompetitionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
        // $this->middleware('access.control:competition');
    }

    public function index()
    {   
        $competitions = Competition::withCount(['normalRegistrations', 'earlyRegistrations' => function (Builder $query) {
                            $query->where('payment_due', '>=', Carbon::now())
                                  ->orWhereHas('payment');
                        }])->get();   
        
        return view('admin.competitions.index', [
            'competitions' => $competitions,
            'isEarlyBirdOngoing' => $this->validateEnvironment('ENV002')
        ]);
    }

    public function create()
    {
        return view('admin.competitions.create');
    }

    public function store(Request $request)
    {   
        // dd($request);
        $this->validateRequest($request);
        $proofNameToStore = null;
        if ($request->hasFile('logo')) {
            $extension = $request->file('logo')->getClientOriginalExtension();
            $proofNameToStore = $request->input('name') . '.' . $extension;
            $request->file('logo')->storeAs('public/images/competitions', $proofNameToStore);
        }
        $proofNameToStoreQR = null;
        if ($request->hasFile('qr_code_whatsapp')) {
            $extension = $request->file('qr_code_whatsapp')->getClientOriginalExtension();
            $proofNameToStoreQR = $request->input('name') . '.' . $extension;
            $request->file('qr_code_whatsapp')->storeAs('public/images/competitions/QR', $proofNameToStoreQR);
        }

        Competition::create([
            'logo' => $proofNameToStore,
            'name' => $request->name,
            'normal_price' => str_replace(".", "", $request->normal_price),
            'total_quota' => $request->total_quota,
            'early_price' => str_replace(".", "", $request->early_price),
            'early_quota' => $request->early_quota,
            'content' => $request->content,
            'link_group_whatsapp' => $request->link_group_whatsapp,
            'qr_code_whatsapp' => $proofNameToStoreQR,
            'ebooklet' => $request->ebooklet,
            'is_active' => 1,
        ]);

        return redirect()->route('competitions.index')->with('success', 'Data sucessfully added');
    }

    public function show(Competition $competition)
    {
        return view('admin.competitions.show', [
            'competition' => $competition
        ]);
    }

    public function edit(Competition $competition)
    {
        return view('admin.competitions.edit', [
            'competition' => $competition
        ]);
    }

    public function update(Request $request, Competition $competition)
    {   
        $this->validateRequest($request);
        
        if ($request->hasFile('logo')) {
            if ($competition->logo != NULL)
                Storage::delete('public/images/competitions/' . $competition->logo);
            
            $extension = $request->file('logo')->getClientOriginalExtension();
            $proofNameToStore = $request->input('name') . '.' . $extension;
            $request->file('logo')->storeAs('public/images/competitions', $proofNameToStore);
        } else {
            $proofNameToStore = $competition->logo;
        }

        if ($request->hasFile('qr_code_whatsapp')) {
            if ($competition->qr_code_whatsapp != NULL)
                Storage::delete('public/images/competitions/QR' . $competition->qr_code_whatsapp);
            
            $extension = $request->file('qr_code_whatsapp')->getClientOriginalExtension();
            $proofNameToStoreQR = $request->input('name') . '.' . $extension;
            $request->file('qr_code_whatsapp')->storeAs('public/images/competitions/QR', $proofNameToStoreQR);
        } else {
            $proofNameToStoreQR = $competition->qr_code_whatsapp;
        }

        $competition->update([
            'logo' => $proofNameToStore,
            'name' => $request->name,
            'normal_price' => str_replace(".", "", $request->normal_price),
            'total_quota' => $request->total_quota,
            'early_price' => str_replace(".", "", $request->early_price),
            'early_quota' => $request->early_quota,
            'content' => $request->content,
            'link_group_whatsapp' => $request->link_group_whatsapp,
            'qr_code_whatsapp' => $proofNameToStoreQR,
            'ebooklet' => $request->ebooklet,
        ]);

        return redirect()->route('competitions.index')->with('success', 'Data successfully updated!');
    }

    public function destroy(Competition $competition)
    {
        $competition->delete();

        return redirect()->route('competitions.index')->with('success', 'Data successfully deleted!');
    }

    protected function validateRequest(Request $request)
    {
        return $request->validate([
            'logo' => 'image|dimensions:min_width=300,min_height=300|mimes:jpg,png,jpeg',
            'name'=> 'required|string',
            'normal_price'=> 'required|string',
            'total_quota'=> 'required|integer',
            'early_price'=> 'string|nullable',
            'early_quota'=> 'integer|nullable',
            'link_group_whatsapp' => 'string|nullable',
            'qr_code_whatsapp' => 'image|dimensions:min_width=300,min_height=300|mimes:jpg,png,jpeg',
            'content'=> 'string|nullable',
            'ebooklet'=> 'string|nullable',
        ]);
    }

    protected function getCategoryInitial($category)
    {
        $words = explode(" ", $category);
        $category_init = null;

        foreach ($words as $char) {
            $category_init .= mb_substr($char, 0, 1);
        }

        return $category_init;
    }

    protected function validateEnvironment($code)
    {
        $environment = Environment::where('code', $code)->first();
        if($environment == null){
            return redirect()->back();
        }

        return (Carbon::now() >= $environment->start_time  && Carbon::now() <= $environment->end_time) ? true : false;
    }
}
