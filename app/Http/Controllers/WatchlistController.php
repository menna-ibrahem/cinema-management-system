<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Watchlist;
use Illuminate\Http\Request;

class WatchlistController extends Controller
{

public function index()
    {
        $watchlist = Watchlist::with('movie')
            ->where('device_id', auth()->id())
            ->latest()
            ->get();

        return view('watchlist.index', compact('watchlist'));
    }

    public function store(Movie $movie)
    {
        Watchlist::firstOrCreate([
            'device_id' => auth()->id(),
            'movie_id' => $movie->id,
        ]);

        return back()->with('success', 'Movie added to your watchlist.');
    }

    public function destroy(Watchlist $watchlist)
    {
        if ($watchlist->device_id != auth()->id()) {
            abort(403);
        }

        $watchlist->delete();

        return back()->with('success', 'Movie removed from your watchlist.');
    }
}

