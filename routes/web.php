<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ComicController; 
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdminMiddleware;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// 2.Public Zone 
Route::get('comics', [ComicController::class, 'index'])->name('comics.index');

// 3. User Zone 
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('comics', ComicController::class)
        ->middleware(IsAdminMiddleware::class)
        ->except(['index', 'show']);
});

Route::get('comics/{comic}', [ComicController::class, 'show'])->name('comics.show');

require __DIR__.'/auth.php';
// require __DIR__.'/settings.php'; 