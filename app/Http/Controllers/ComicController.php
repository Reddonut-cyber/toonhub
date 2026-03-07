<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComicController extends Controller
{
    public function index()
    {
        $comics = [
            'Solo Leveling',
            'One Piece',
            'Naruto'
        ];

        return view('comics.index', ['comics' => $comics]);
    }

    public function show($comic)
    {
        return view('comics.show', ['comic' => $comic]);
    }
}
