<?php

use Illuminate\Support\Facades\Route;

// public routes

Route::get('/', \App\Http\Controllers\WelcomeController::class)->name('home');

Route::get('comics', [\App\Http\Controllers\ComicController::class, 'index'])->name('comics.index');
Route::get('comics/{comic}', [\App\Http\Controllers\ComicController::class, 'show'])->name('comics.show');

// user zone

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/settings.php';

// admin zone
