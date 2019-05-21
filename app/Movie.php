<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $hidden = ['created_at', 'updated_at', 'pivot'];

    protected $fillable = ['title', 'movie_poster', 'release_year'];

    protected $appends = ['display_year'];

    public static function boot()
    {
        parent::boot();
        static::updating(function (Movie $movie) {
            if ($movie->original['movie_poster'] != $movie->attributes['movie_poster']) {
                \Storage::disk('public_uploads')->delete($movie->original['movie_poster']);
            }
        });
        static::deleting(function (Movie $movie) {
            $movie->actors()->detach();
            $movie->directors()->detach();
            $movie->producers()->detach();
            \Storage::disk('public_uploads')->delete($movie->attributes['movie_poster']);
        });
    }

    public function Actors()
    {
        return $this->belongsToMany('App\Person', 'actors_movies', 'movie_id', 'person_id');
    }

    public function Directors()
    {
        return $this->belongsToMany('App\Person', 'directors_movies', 'movie_id', 'person_id');
    }

    public function Producers()
    {
        return $this->belongsToMany('App\Person', 'producers_movies', 'movie_id', 'person_id');
    }

    public function getDisplayYearAttribute()
    {
        return numberToRomanRepresentation($this->release_year);
    }

    public function getFullNameAttribute()
    {
        return beautifyWords($this->title);
    }

    public function setMoviePosterAttribute($value)
    {
        $path = \Storage::disk('public_uploads')->putFile('movie_posters', $value);

        $this->attributes['movie_poster'] = $path;
    }

    public function getMoviePosterAttribute()
    {
        $img = asset('img/no-img.jpg');
        if (!is_null($this->attributes['movie_poster']))
            $img = asset('uploads/' . $this->attributes['movie_poster']);
        return $img;
    }
}
