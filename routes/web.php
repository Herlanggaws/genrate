<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/generator', function () {
    return view('generator');
})->name('generator');

Route::post('/generator/analyze', function () {
    // Validate the form data
    $validated = request()->validate([
        'instagram' => 'nullable|string|max:255',
        'tiktok' => 'nullable|string|max:255',
        'youtube' => 'nullable|string|max:255',
    ]);

    // Check if at least one field is provided
    if (empty($validated['instagram']) && empty($validated['tiktok']) && empty($validated['youtube'])) {
        return back()->withErrors(['general' => 'Please enter at least one username or URL.'])->withInput();
    }

    // Store the data in session for the next step
    session(['user_profiles' => $validated]);

    // Redirect to preview page
    return redirect()->route('preview');
})->name('generator.analyze');

Route::get('/preview', function () {
    // Check if user has submitted profile data
    if (!session()->has('user_profiles')) {
        return redirect()->route('generator')->with('error', 'Please submit your profile information first.');
    }
    
    return view('preview');
})->name('preview');

Route::get('/payment', function () {
    // Check if user has viewed preview
    if (!session()->has('user_profiles')) {
        return redirect()->route('generator')->with('error', 'Please complete the previous steps first.');
    }
    
    return view('payment');
})->name('payment');

Route::get('/ratecard', function () {
    // Check if user has completed payment simulation
    if (!session()->has('user_profiles')) {
        return redirect()->route('generator')->with('error', 'Please complete the previous steps first.');
    }
    
    return view('ratecard');
})->name('ratecard');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');
