<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Watchlist;
use Illuminate\Http\Request;

class WatchlistController extends Controller
{
    // View user's watchlist
    public function index(Request $request)
    {
        $request->validate([
            'device_id' => 'required|string'
        ]);

        $watchlist = Watchlist::with('movie')
            ->where('device_id', $request->device_id)
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'watchlist' => $watchlist
        ]);
    }


    // Remove movie from watchlist
    public function destroy(Request $request, $id)
    {
        $request->validate([
            'device_id' => 'required|string'
        ]);

        $watchlist = Watchlist::where('id', $id)
            ->where('device_id', $request->device_id)
            ->first();

        if (!$watchlist) {
            return response()->json([
                'success' => false,
                'message' => 'Watchlist item not found'
            ], 404);
        }

        $watchlist->delete();

        return response()->json([
            'success' => true,
            'message' => 'Movie removed from watchlist'
        ]);
    }
}
