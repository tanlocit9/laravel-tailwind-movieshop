<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use HasFactory;
    protected $table = 'staffs';

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'image_avatar',
        'image_id_card_front',
        'image_id_card_back',
        'address',
        'staff_status_id'
    ];
    public function roles()
    {
        return $this->belongsToMany(StaffRole::class, "privileges", "staff_id", "staff_role_id");
    }

    public function privileges()
    {
        return Privilege::where("staff_id", $this->id)->pluck("staff_role_id");
    }

    public function accessibilities()
    {
        return Accessibility::whereIn('staff_role_id', $this->privileges())->get()->groupBy('component_id')->collect()->toArray();
    }

    public function getAccessibilitiesByComponent($component)
    {
        $componentId=Component::findByName($component)->first()->id;
        return Accessibility::where('staff_role_id', $this->privileges())->where('component_id', $componentId)->get(['permission_id', 'component_id'])->groupBy(['component_id', 'permission_id'])->collect()->toArray()[$componentId];
    }
    public function getStatus()
    {
        return StaffStatus::find($this->staff_status_id)->status;
    }
}
