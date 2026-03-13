<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ComicController; 
use App\Http\Controllers\FavoriteController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Comic;
use App\Models\Category;
use App\Http\Middleware\IsAdminMiddleware;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// 2.Public Zone 
Route::get('comics', [ComicController::class, 'index'])->name('comics.index');

// 3. User Zone 
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->usertype === 'admin') {
            return view('dashboard', [
                'totalComics' => Comic::count(),
                'totalUsers' => User::count(),
                'totalCategories' => Category::count(),
                'latestComics' => Comic::latest()->take(5)->get(),
                'latestUsers' => User::latest()->take(5)->get(),
                'comics' => Comic::latest()->get(),
            ]);
        }
        
        return view('dashboard', [
            'favorites' => auth()->user()->favorites()->orderByPivot('created_at', 'desc')->get(),
        ]);
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/comics/{comic}/favorite', [FavoriteController::class, 'toggle'])->name('comics.favorite');

    Route::resource('comics', ComicController::class)
        ->middleware(IsAdminMiddleware::class)
        ->except(['index', 'show']);
});

Route::get('comics/{comic}', [ComicController::class, 'show'])->name('comics.show');

require __DIR__.'/auth.php';
// require __DIR__.'/settings.php'; 