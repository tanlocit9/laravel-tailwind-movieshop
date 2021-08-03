<?php

use App\Models\Staff;
use App\Models\StaffRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffRolePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_role_permissions', function (Blueprint $table) {
            $table->foreignId('staff_role_id')->comment("Mã vai trò nhân viên")->constrained('staff_roles')->onDelete('cascade');
            $table->foreignId('permission_id')->comment("Mã quyền")->constrained('permissions')->onDelete('cascade');
            $table->string('component')->comment("Thành phần");
            $table->primary(array('staff_role_id', 'permission_id'));
        });
        $superAdmin = StaffRole::find(1);
        $superAdmin->permissions()->attach(1,['component'=>'any']);
        $superAdmin->permissions()->attach(2,['component'=>'any']);
        $superAdmin->permissions()->attach(3,['component'=>'any']);
        $superAdmin->permissions()->attach(4,['component'=>'any']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_role_permissions');
    }
}
