<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'date',
        'movie_id',
        'theater_id',
    ];
    public function sessions(){
        return $this->hasMany(Session::class);
    }
    public function showtime($movie_id,$theater_id){
        return $this->sessions()->where('movie_id',$movie_id)->where('theater_id',$theater_id)->get();
    }
}
