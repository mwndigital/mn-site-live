<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\GetAQuote;
use App\Models\WhatIDo;
use Illuminate\Http\Request;

class FrontendGetQuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wid = WhatIDo::orderBy('title', 'asc')->get();
        return view('frontend.pages.get-a-quote.index', compact('wid'));
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
        $validated = $request->validate([
            'describe_you' => ['required', 'string'],
            'budget' => ['required', 'string'],
            'looking_for' => ['required', 'string'],
            'pages_required' => ['nullable', 'string', 'max:2000'],
            'similar_websites' => ['nullable', 'string', 'max:20000'],
            'complete_project_by' => ['nullable', 'date'],
            'any_other_details' => ['nullable', 'string', 'max:20000'],
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'email_address' => ['required', 'email', 'max:255'],
            'phone_number' => ['nullable', 'tel', 'max:14'],
        ]);

        GetAQuote::create([
            'describe_your' => $validated['describe_you'],
            'budget' => $validated['budget'],
            'looking_for' => $validated['looking_for'],
            'pages_required' => $validated['pages_required'],
            'similar_websites' => $validated['similar_websites'],
            'complete_project_by' => $validated['complete_project_by'],
            'any_other_details' => $validated['any_other_details'],
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'company_name' => $validated['company_name'],
            'email_address' => $validated['email_address'],
            'phone_number' => $validated['phone_number'],
            'status' => 'unread',
        ]);
        return redirect()->back()->with('success', "I've received your quote request and will be back in touch with you very soon");
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}