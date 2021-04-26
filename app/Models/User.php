<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function ratings(){
        return $this->belongsToMany(Rating::class,'ratings')->withPivot(['is_main']);
    }
    public function avg_rate(){
        return $this->ratings()->avg('star');
    }
    public function cart_items(){
        return $this->belongsToMany(Price::class,"cart_items","user_id","price_id");
    }
    // public function admins(){
    //     return $this->roles()->where('role_name','admin');
    // }
    // public function customers(){
    //     return $this->roles()->where('role_name','customer');
    // }
}
