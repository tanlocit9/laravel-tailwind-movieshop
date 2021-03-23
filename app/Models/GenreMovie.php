<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GenreMovie extends Model
{
    use HasFactory;
    public $table = 'genre_movie';
    public function genres(){
        return $this->hasMany(Genre::class,'genres');
    }
}
