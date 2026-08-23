<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;

class Watchlist extends Model
{
    protected $fillable = [
        'device_id',
        'movie_id',
    ];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}

