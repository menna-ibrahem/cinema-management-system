<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Watchlist;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    // Display all movies
    public function index()
    {
        $movies = Movie::latest()->get();

        return response()->json([
            'success' => true,
            'movies' => $movies
        ]);
    }


    // View movie details
    public function show($id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json([
                'success' => false,
                'message' => 'Movie not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'movie' => $movie
        ]);
    }


    // Add movie to watchlist
    public function addToWatchlist(Request $request, $id)
    {
        $movie = Movie::find($id);

        if (!$movie) {
            return response()->json([
                'success' => false,
                'message' => 'Movie not found'
            ], 404);
        }

        $request->validate([
            'device_id' => 'required|string'
        ]);

        $watchlist = Watchlist::firstOrCreate([
            'device_id' => $request->device_id,
            'movie_id' => $movie->id,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Movie added to watchlist',
            'watchlist' => $watchlist
        ], 201);
    }
}

