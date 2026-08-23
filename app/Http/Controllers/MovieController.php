<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::latest()->get();
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        $data = $request->validated();

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('movies', 'public');
    }

    Movie::create($data);

    return redirect()
        ->route('movies.index')
        ->with('success', 'Movie added successfully.');
    }

    /**
     * Display the specified resource.
     */
public function show(Movie $movie)
{
    return view('movies.show', compact('movie'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        return view('movies.edit', compact('movie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreMovieRequest $request, Movie $movie)
{
    $data = $request->validated();

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('movies', 'public');
    }

    $movie->update($data);

    return redirect()
        ->route('movies.index')
        ->with('success', 'Movie updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
{
    if ($movie->image) {
        Storage::disk('public')->delete($movie->image);
    }

    $movie->delete();

    return redirect()
        ->route('movies.index')
        ->with('success', 'Movie deleted successfully.');
}
}
