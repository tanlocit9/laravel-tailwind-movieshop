<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Searchable;
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
        'phone_number',
        'role_id',
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
        return $this->belongsToMany(Price::class, "bills", "user_id", "price_id");
    }

    public function bills()
    {
        return $this->hasMany(Bill::class);
    }

    public function getBillAmountByCalendar($calendaId)
    {
        $bill = $this->bills()->where('calendar_id', $calendaId)->get();
        $array = array_fill(1, Price::all()->count(), 0);
        foreach ($bill as $billItem) {
            $array[$billItem->price_id] = $billItem->amount;
        }
        return $array;
    }

    public function getTotalTicketSelected($calendaId)
    {
        $bill = $this->bills()->where('calendar_id', $calendaId)->get();
        $sum = 0;
        foreach ($bill as $billItem) {
            if (Price::find($billItem->price_id)->price_type_id == 1) {
                $sum+=$billItem->amount;
            }
        }
        return $sum;
    }
}
