<?php

use Illuminate\Support\Facades\Route;

// public routes

Route::get('/', \App\Http\Controllers\WelcomeController::class)->name('home');

// user zone

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';

// admin zone
