<?php

namespace App\Services;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class TmdbService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function searchMovie($title)
    {
        $response = Http::get('https://api.themoviedb.org/3/search/movie', [
            'api_key' => config('services.tmdb.api_key'),
            'query' => $title,
        ]);

        return $response->json();
    }

     public function downloadPoster($posterPath, $fileName)
    {
        $imageUrl = 'https://image.tmdb.org/t/p/w500' . $posterPath;

        $image = Http::get($imageUrl)->body();

        Storage::disk('public')->put(
            'movies/' . $fileName,
            $image
        );
    }
}
