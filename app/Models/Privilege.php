<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'staff_role_id',
        'staff_id'
    ];
}
