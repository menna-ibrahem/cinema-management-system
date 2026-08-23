<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use App\Models\Movie;
use App\Services\TmdbService;

#[Signature('movies:download-posters')]
#[Description('Download posters for all movies')]
class DownloadMoviePosters extends Command
{
    /**
     * Execute the console command.
     */
    public function handle(TmdbService $tmdb)
    {
        $movies = Movie::all();
        foreach ($movies as $movie) {

            $this->info("Downloading: {$movie->title}");

            $result = $tmdb->searchMovie($movie->title);

            if (
            !empty($result['results']) &&
            !empty($result['results'][0]['poster_path'])
            ) {
            $posterPath = $result['results'][0]['poster_path'];
            $fileName = $movie->id . '.jpg';
            $tmdb->downloadPoster($posterPath, $fileName);
            $movie->image = $fileName;
            $movie->save();

            $this->info("✓ {$movie->title} done");
            }
        }
    }
}
