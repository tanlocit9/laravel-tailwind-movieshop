<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessibility extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $fillable = [
        'staff_role_id',
        'permission_id',
        'component_id'
    ];
    public static function hasAuthorize($permissionId, $accessibilities)
    {
        if (array_key_exists($permissionId, $accessibilities)) {
            return true;
        }
        return false;
    }
}
