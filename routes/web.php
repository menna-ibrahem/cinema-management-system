<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\WatchlistController;
use App\Http\Controllers\ChatbotController;


Route::resource('movies', MovieController::class)
    ->middleware(['auth', 'admin'])
    ->except(['index', 'show']);

Route::get('/movies', [MovieController::class, 'index'])
    ->name('movies.index');

Route::get('/movies/{movie}', [MovieController::class, 'show'])
    ->name('movies.show');

Route::post('/watchlist/{movie}', [WatchlistController::class, 'store'])
    ->middleware('auth')
    ->name('watchlist.store');

Route::get('/watchlist', [WatchlistController::class, 'index'])
    ->middleware('auth')
    ->name('watchlist.index');

Route::delete('/watchlist/{watchlist}', [WatchlistController::class, 'destroy'])
    ->middleware('auth')
    ->name('watchlist.destroy');

Route::get('/', function (\Illuminate\Http\Request $request) {

    $query = \App\Models\Movie::query();

    // Search by movie title
    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    // Filter by rating
    if ($request->filled('rating')) {
        $query->where('rating', '>=', $request->rating);
    }

    $movies = $query->latest()->get();

    return view('home', compact('movies'));
});

Route::get('/search', function (\Illuminate\Http\Request $request) {

    $query = \App\Models\Movie::query();

    if ($request->filled('search')) {
        $query->where('title', 'like', '%' . $request->search . '%');
    }

    if ($request->filled('rating')) {
        $query->where('rating', '>=', $request->rating);
    }

    $movies = $query->latest()->get();

    return view('search', compact('movies'));

})->name('search');

Route::post('/chatbot', [ChatbotController::class, 'chat'])
    ->middleware('auth')
    ->name('chatbot.chat');

Route::get('/chatbot', function () {
    return view('chatbot');
})
->middleware('auth')
->name('chatbot');