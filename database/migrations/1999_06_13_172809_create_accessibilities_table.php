<?php

use App\Models\Accessibility;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessibilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessibilities', function (Blueprint $table) {
            $table->foreignId('staff_role_id')->comment("Mã vai trò nhân viên")->constrained('staff_roles')->onDelete('cascade');
            $table->foreignId('permission_id')->comment("Mã quyền")->constrained('permissions')->onDelete('cascade');
            $table->foreignId('component_id')->comment("Mã thành phần")->constrained('components')->onDelete('cascade');
            $table->primary(array('staff_role_id', 'permission_id', 'component_id'));
        });
        $data = [
            ['staff_role_id' => 1, 'permission_id' => 1, 'component_id' => 1],
            ['staff_role_id' => 1, 'permission_id' => 1, 'component_id' => 2],
            ['staff_role_id' => 1, 'permission_id' => 1, 'component_id' => 3],
            ['staff_role_id' => 1, 'permission_id' => 1, 'component_id' => 4],
            ['staff_role_id' => 1, 'permission_id' => 1, 'component_id' => 5],
            ['staff_role_id' => 1, 'permission_id' => 1, 'component_id' => 6],
            ['staff_role_id' => 1, 'permission_id' => 1, 'component_id' => 7],
            ['staff_role_id' => 1, 'permission_id' => 1, 'component_id' => 8],
            ['staff_role_id' => 1, 'permission_id' => 1, 'component_id' => 9],

            ['staff_role_id' => 1, 'permission_id' => 2, 'component_id' => 1],
            ['staff_role_id' => 1, 'permission_id' => 2, 'component_id' => 2],
            ['staff_role_id' => 1, 'permission_id' => 2, 'component_id' => 3],
            ['staff_role_id' => 1, 'permission_id' => 2, 'component_id' => 4],
            ['staff_role_id' => 1, 'permission_id' => 2, 'component_id' => 5],
            ['staff_role_id' => 1, 'permission_id' => 2, 'component_id' => 6],
            ['staff_role_id' => 1, 'permission_id' => 2, 'component_id' => 7],
            ['staff_role_id' => 5, 'permission_id' => 1, 'component_id' => 5],
            ['staff_role_id' => 5, 'permission_id' => 2, 'component_id' => 5],
            ['staff_role_id' => 5, 'permission_id' => 3, 'component_id' => 5],
            ['staff_role_id' => 5, 'permission_id' => 4, 'component_id' => 5],
        ];
        Accessibility::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accessibilities');
    }
}
