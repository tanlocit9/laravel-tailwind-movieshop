<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    public static function findByPermission($permission){
        return Permission::where("permission",$permission)->get();
    }
}
