<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theater extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'theater_name',
        'theater_address',
        'theater_phone',
    ];
    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
    public function rooms(){
        return $this->hasMany(Room::class);
    }
}
