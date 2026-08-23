<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\WatchlistController;

Route::get('/movies', [MovieController::class, 'index']);

Route::get('/movies/{id}', [MovieController::class, 'show']);

Route::post('/movies/{id}/watchlist', [MovieController::class, 'addToWatchlist'])
    ->middleware('auth:sanctum');

Route::get('/watchlist', [WatchlistController::class, 'index'])
    ->middleware('auth:sanctum');

Route::delete('/watchlist/{id}', [WatchlistController::class, 'destroy'])
    ->middleware('auth:sanctum');