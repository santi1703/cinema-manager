<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Person extends Model
{
    protected $fillable = ['first_name', 'last_name', 'date_of_birth'];

    protected $hidden = ['created_at', 'updated_at', 'pivot'];

    public static function boot()
    {
        parent::boot();
        static::deleting(function (Person $person) {
            $person->asActor()->detach();
            $person->asDirector()->detach();
            $person->asProducer()->detach();
        });
    }

    public function Aliases()
    {
        return $this->hasMany('App\Alias');
    }

    public function AsActor()
    {
        return $this->belongsToMany('App\Movie', 'actors_movies','person_id', 'movie_id');
    }

    public function AsDirector()
    {
        return $this->belongsToMany('App\Movie', 'directors_movies','person_id', 'movie_id');
    }

    public function AsProducer()
    {
        return $this->belongsToMany('App\Movie', 'producers_movies','person_id', 'movie_id');
    }

    public function getFriendlyBirthdateAttribute()
    {
        return Carbon::createFromFormat('Y-m-d', $this->date_of_birth)->format('d/m/Y');
    }

    public function getFirstNameAttribute()
    {
        return beautifyWords($this->attributes['first_name']);
    }

    public function getLastNameAttribute()
    {
        return beautifyWords($this->attributes['last_name']);
    }

    public function getFullNameAttribute()
    {
        return beautifyWords($this->first_name . ' ' . $this->last_name);
    }
}
