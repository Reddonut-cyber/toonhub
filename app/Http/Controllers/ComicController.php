<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use App\Models\Category;
use Illuminate\Http\Request;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::with('categories')->latest()->get();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Comic::class); // Optional: For admin authorization
        $categories = Category::orderBy('name')->get();
        return view('comics.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Comic::class); // Optional: For admin authorization

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'status' => 'required|in:Ongoing,Completed',
            'comic_web' => 'nullable|url|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            // The 'comics' is the folder name in `storage/app/public`
            $imagePath = $request->file('image')->store('comics', 'public');
        }

        $comic = Comic::create([
            'name' => $validated['name'],
            'summary' => $validated['summary'],
            'status' => $validated['status'],
            'comic_web' => $validated['comic_web'],
            'image' => $imagePath,
        ]);

        $comic->categories()->sync($validated['categories']);

        return redirect()->route('comics.index')->with('success', 'การ์ตูนเรื่อง "'.$comic->name.'" ถูกสร้างเรียบร้อยแล้ว!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    // ... other methods like edit, update, destroy
}