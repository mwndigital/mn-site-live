<?php

namespace App\Http\Controllers\Frontend\Pages;

use App\Http\Controllers\Controller;
use App\Models\ContactFormSubmissions;
use Illuminate\Http\Request;

class FrontendContactPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('frontend.pages.contact-me.index');
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email_address' => ['required', 'email', 'max:255'],
            'phone_number' => ['nullable', 'regex:/(01)[0-9]{9}/', 'max:14'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'reason_for_contacting' => ['nullable', 'string', 'max:255'],
            'your_message' => ['nullable', 'string', 'max:2500'],
            'g-recaptcha-response' => 'recaptcha',
        ]);

        $formSubmission = ContactFormSubmissions::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email_address' => $validated['email_address'],
            'phone_number' => $validated['phone_number'],
            'company_name' => $validated['company_name'],
            'reason_for_contacting' => $validated['reason_for_contacting'],
            'your_message' => $validated['your_message'],

        ]);

        return redirect()->back()->with('success', 'Your message has been sent successfully');
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