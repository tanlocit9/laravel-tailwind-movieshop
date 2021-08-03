<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'staff_role_id',
        'theater_id'
    ];
    public function roles()
    {
        return $this->belongsTo(StaffRole::class);
    }
}
