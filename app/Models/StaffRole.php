<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffRole extends Model
{
    use HasFactory;
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'staff_role_permissions', 'staff_role_id', 'permission_id');
    }
}
