<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    public function theater()
    {
        return $this->belongsTo(Theater::class);
    }
    public function status()
    {
        return $this->belongsTo(RoomStatus::class);
    }
    public function schedule()
    {
        return $this->hasMany(RoomSchedule::class);
    }
}
