<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Watchlist;

class Movie extends Model
{
    public function watchlists()
    {
        return $this->hasMany(Watchlist::class);
    }

    protected $fillable = [
    'title',
    'description',
    'release_year',
    'rating',
    'image',
];
}