<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'duration',
        'age_limit',
        'release_date',
        'poster',
        'country_id',
        'type_id'
    ];

    public function actors(){
        return $this->belongsToMany(Actor::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function ratings(){
        return $this->belongsToMany(Rating::class,'ratings')->withPivot(['is_main']);
    }
    public function avg_rate(){
        return $this->ratings()->avg('star');
    }
    public function genres(){
        return $this->belongsToMany(Genre::class,'genre_movie')->withPivot(['is_main']);
    }
    public function main_genre(){
        return $this->genres()->wherePivot('is_main',1);
    }
    public function sub_genre(){
        return $this->genres()->wherePivot('is_main',0);
    }
    public function main_actor(){
        return $this->actors()->wherePivot('role_id',3);
    }
    public function sub_actor(){
        return $this->actors()->wherePivot('role_id',4);
    }
    public function scopeSelectGroupedSubGenres($query, $alias)
    {
        $query->addSelect([
            $alias => Movie::with('genres')::selectRaw('GROUP_CONCAT(genre_name SEPARATOR " | ")')->where('movie_id','id')

        ]);
    }
}
