<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;

class FaqController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
        $this->middleware('admin')->except('index');
        // $this->middleware('access.control:faq');
    }
    public function index()
    {
        return view('admin.faqs.index', [
            'generalFaqs' => Faq::where('category', 'general')->get(),
            'competitionFaqs' => Faq::where('category', 'competition')->get()
        ]);
    }

    public function manage()
    {
        return view('admin.faqs.manage', [
            'generalFaqs' => Faq::where('category', 'general')->get(),
            'competitionFaqs' => Faq::where('category', 'competition')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.faqs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string'
        ]);

        Faq::create([
            'category' => $request->category,
            'sub_category' => $request->has('sub_category') ? $request->sub_category : null,
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => 1
        ]);

        return redirect()->route('faqs.manage')->with('success', 'Data sucessfully added');
    }

    public function show(Faq $faq)
    {
        //
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', [
            'faq' => $faq
        ]);
    }

    public function update(Request $request, Faq $faq)
    {   
        $request->validate([
            'category' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string'
        ]);

        $faq->update([
            'category' => $request->category,
            'sub_category' => $request->has('sub_category') ? $request->sub_category : null,
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('faqs.manage')->with('success', 'Data successfully updated!');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('faqs.manage')->with('success', 'Data successfully deleted!');
    }
}
