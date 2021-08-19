<?php

namespace App\Http\Livewire\Backend\Management;

use App\Models\Accessibility;
use App\Models\Component as ModelsComponent;
use App\Models\Permission;
use App\Models\StaffRole;
use Livewire\Component;

class RoleManagement extends Component
{
    public $currentRole;
    public $staffRoles;
    public $permissions;
    public $accessibilities;
    public $components;
    public $listSelected;
    public $listUnSelected;
    public function mount()
    {
        $this->currentRole = StaffRole::find(1);
        $this->staffRoles = StaffRole::all();
        $this->permissions = Permission::all();
        $this->accessibilities = Accessibility::where('staff_role_id', $this->currentRole->id)->get(['permission_id', 'component_id'])->groupBy(['permission_id', 'component_id'])->collect()->toArray();
        $this->components = ModelsComponent::all();
    }
    public function changeRole($roleId)
    {
        $this->currentRole =StaffRole::find($roleId);
        $this->accessibilities = Accessibility::where('staff_role_id', $this->currentRole['id'])->get(['permission_id', 'component_id'])->groupBy(['permission_id', 'component_id'])->collect()->toArray();
    }
    public function selectPermision($componentId, $permissionId)
    {
        $a = Accessibility::where('permission_id', $permissionId)->where('component_id', $componentId)->where('staff_role_id', $this->currentRole['id'])->get();
        if ($a->count() == 0) {
            $this->currentRole->components()->attach($componentId, ['permission_id' => $permissionId]);
        }
    }
    public function unSelectPermision($componentId, $permissionId)
    {
        Accessibility::where('permission_id', $permissionId)->where('component_id', $componentId)->where('staff_role_id', $this->currentRole['id'])->delete();
    }
    public function render()
    {
        return view('livewire.backend.management.role-management');
    }
}
