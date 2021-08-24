<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'time_start',
        'room_id',
        'schedule_id'
    ];
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
    public function getRoomName()
    {
        return Room::find($this->room_id)->name;
    }
    public function getStatusName()
    {
        return RoomStatus::find($this->calendar_status_id)->status;
    }
}
