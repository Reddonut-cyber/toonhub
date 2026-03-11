<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ComicController; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// 2.Public Zone 
Route::get('comics', [ComicController::class, 'index'])->name('comics.index');
Route::get('comics/{comic}', [ComicController::class, 'show'])->name('comics.show');

// 3. User Zone 
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/comics/create', [ComicController::class, 'create'])->name('comics.create');
    Route::post('/comics', [ComicController::class, 'store'])->name('comics.store');
});

require __DIR__.'/auth.php';
// require __DIR__.'/settings.php'; 