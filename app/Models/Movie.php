<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Movie extends Model
{
    use HasFactory, Sluggable, SluggableScopeHelpers;
    public $keyType = 'string';
    protected $fillable = [
        'title',
        'slug',
        'description',
        'duration',
        'age_limit',
        'release_date',
        'poster',
        'country_id',
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['title', 'id']
            ]
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function actors(){
        return $this->belongsToMany(Actor::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function ratings(){
        return $this->belongsToMany(Rating::class,'ratings','movie_id','user_id');
    }
    public function schedules(){
        return $this->belongsToMany(Theater::class,'schedules');
    }
    public function avg_rate(){
        return $this->hasMany(Rating::class)->avg('star');
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

}
