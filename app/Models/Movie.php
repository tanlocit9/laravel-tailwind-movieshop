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
}
