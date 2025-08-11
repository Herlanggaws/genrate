<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GeneratorController extends Controller
{
    /**
     * Show the generator form
     */
    public function show()
    {
        return view('generator');
    }

    /**
     * Analyze the submitted profiles
     */
    public function analyze(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'instagram' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
        ]);

        // Check if at least one field is provided
        if (empty($validated['instagram']) && empty($validated['tiktok']) && empty($validated['youtube'])) {
            return back()->withErrors(['general' => 'Please enter at least one username or URL.'])->withInput();
        }

        // Get TikTok profile data if connected
        $tiktokProfile = Session::get('tiktok_profile');
        if ($tiktokProfile) {
            $validated['tiktok_data'] = $tiktokProfile;
        }

        // Store the data in session for the next step
        Session::put('user_profiles', $validated);

        // Redirect to preview page
        return redirect()->route('preview');
    }

    /**
     * Show the preview page
     */
    public function preview()
    {
        // Check if user has submitted profile data
        if (!Session::has('user_profiles')) {
            return redirect()->route('generator')->with('error', 'Please submit your profile information first.');
        }
        
        return view('preview');
    }

    /**
     * Show the payment page
     */
    public function payment()
    {
        // Check if user has viewed preview
        if (!Session::has('user_profiles')) {
            return redirect()->route('generator')->with('error', 'Please complete the previous steps first.');
        }
        
        return view('payment');
    }

    /**
     * Show the rate card page
     */
    public function ratecard()
    {
        // Check if user has completed payment simulation
        if (!Session::has('user_profiles')) {
            return redirect()->route('generator')->with('error', 'Please complete the previous steps first.');
        }
        
        return view('ratecard');
    }
} 