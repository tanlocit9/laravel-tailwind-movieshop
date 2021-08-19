<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffRole extends Model
{
    use HasFactory;
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'accessibilities', 'staff_role_id', 'permission_id');
    }
    public function components()
    {
        return $this->belongsToMany(Component::class, 'accessibilities', 'staff_role_id', 'component_id');
    }
}
