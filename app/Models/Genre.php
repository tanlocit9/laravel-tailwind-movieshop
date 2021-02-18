<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'genre_name',
        'genre_description'
    ];
    public function movies()
    {
        return $this->belongsToMany(Movie::class,'genre_movie')->withPivot('is_main');
    }
}
