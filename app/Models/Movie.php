<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_name',
        'movie_description',
        'movie_duration',
        'age_limit',
        'release_day',
        'poster',
        'country_id'
    ];

    public function actors(){
        return $this->belongsToMany(Actor::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function avg_rate(){
        return $this->hasMany(Ratings::class)->avg('star');
    }
    public function genres(){
        return $this->belongsToMany(Genre::class,'genre_movie')->withPivot(['is_main']);
    }
    public function main_genre(){
        return $this->genres()->wherePivot('is_main',1);
    }
}
