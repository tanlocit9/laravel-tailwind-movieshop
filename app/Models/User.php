<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    public $keyType = 'string';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'id_card_number',
        'phone_number',
        'social_id',
        'social_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'social_id',
        'social_type'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function ratings()
    {
        return $this->belongsToMany(Rating::class, 'ratings')->withPivot(['is_main']);
    }

    public function avg_rate()
    {
        return $this->ratings()->avg('star');
    }

    public function prices()
    {
        return $this->belongsToMany(Price::class, "tickets", "user_id", "price_id");
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    public function getTicketAmountByCalendar($calendaId)
    {
        $ticket = $this->tickets()->where('calendar_id', $calendaId)->get();
        $array = array_fill(1, Price::all()->count(), 0);
        foreach ($ticket as $ticketItem) {
            $array[$ticketItem->price_id] = $ticketItem->amount;
        }
        return $array;
    }

    public function getTotalTicketSelected($calendaId)
    {
        $ticket = $this->tickets()->where('calendar_id', $calendaId)->get();
        $sum = 0;
        foreach ($ticket as $ticketItem) {
            if (Price::find($ticketItem->price_id)->price_type_id == 1) {
                $sum+=$ticketItem->amount;
            }
        }
        return $sum;
    }
}
