<?php

namespace App\Http\Livewire\Backend\Modal;

use App\Models\Privilege;
use App\Models\Staff;
use App\Models\StaffRole;
use Livewire\Component;

class AssignRole extends Component
{
    public $staffs;
    public $staffId;
    public $role;
    public $roles;
    public $staffRoles;
    public $currentStaff;
    protected $listeners = ['openAssignRoleModal' => 'openAssignRoleModal'];
    public function mount()
    {
        $this->staffId = 0;
        $this->staffs = Staff::all();
        $this->roles = StaffRole::all();
    }
    public function save()
    {
        Privilege::create([
            'staff_role_id' => $this->role,
            'staff_id' => $this->staffId
        ]);
        $this->emit('openInformModal', "Assign role", "Success");
        $this->closeAssignRoleModal();
    }
    public function openAssignRoleModal()
    {
        $this->dispatchBrowserEvent('open-assign-role');
    }

    public function closeAssignRoleModal()
    {
        $this->dispatchBrowserEvent('close-assign-role');
    }
    public function render()
    {
        $this->currentStaff = $this->staffId;
        $this->staffRoles = Privilege::where('staff_id', $this->staffId)->get()->pluck('staff_role_id')->toArray();
        return view('livewire.backend.modal.assign-role');
    }
}
