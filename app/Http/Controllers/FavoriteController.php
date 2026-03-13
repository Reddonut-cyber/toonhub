<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggle(Comic $comic)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();
        
        $attached = $user->favorites()->toggle($comic->id);

        return response()->json([
            'attached' => count($attached['attached']) > 0,
        ]);
    }
}