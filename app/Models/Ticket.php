<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_price',
        'user_id',
        'calendar_id',
        'paymode_id',
        'ticket_status_id'
    ];
    public function prices()
    {
        return $this->belongsToMany(Price::class, 'ticket_infos', 'ticket_id', 'price_id')->withPivot(['name', 'amount']);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function payMode()
    {
        return $this->belongsTo(PayMode::class, "paymode_id", "id");
    }
    public function schedule()
    {
        return Calendar::find($this->calendar_id)->schedule;
    }
    public function status()
    {
        return $this->belongsTo(TicketStatus::class, "ticket_status_id", "id");
    }
    public function movie()
    {
        return $this->schedule()->movie;
    }
    public function theater()
    {
        return $this->schedule()->theater;
    }
}
