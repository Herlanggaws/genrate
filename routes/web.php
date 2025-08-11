<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/generator', [App\Http\Controllers\GeneratorController::class, 'show'])->name('generator');
Route::post('/generator/analyze', [App\Http\Controllers\GeneratorController::class, 'analyze'])->name('generator.analyze');
Route::get('/preview', [App\Http\Controllers\GeneratorController::class, 'preview'])->name('preview');
Route::get('/payment', [App\Http\Controllers\GeneratorController::class, 'payment'])->name('payment');
Route::get('/ratecard', [App\Http\Controllers\GeneratorController::class, 'ratecard'])->name('ratecard');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

// TikTok OAuth Routes
Route::get('/tiktok/connect', [App\Http\Controllers\TikTokController::class, 'redirect'])->name('tiktok.connect');
Route::get('/tiktok/callback', [App\Http\Controllers\TikTokController::class, 'callback'])->name('tiktok.callback');
Route::get('/tiktok/disconnect', [App\Http\Controllers\TikTokController::class, 'disconnect'])->name('tiktok.disconnect');
