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
    public function calendars(){
        return $this->hasMany(Calendar::class);
    }
    public function showtime($movie_id,$theater_id){
        return $this->calendars()->where('movie_id',$movie_id)->where('theater_id',$theater_id)->get();
    }
}
