<?php

use App\Models\StaffRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_roles', function (Blueprint $table) {
            $table->id()->comment("Mã vai trò nhân viên");
            $table->string('role', 30)->comment("Tên vai trò nhân viên trong hệ thống");
            $table->string('description')->comment("Mô tả vai trò")->nullable();
        });
        $data = [
            ['role' => 'Super Admin', 'description' => null],
            ['role' => 'Super Manager', 'description' => null],
            ['role' => 'Theater Manager', 'description' => null],
            ['role' => 'Manager', 'description' => null],
            ['role' => 'Ticketer', 'description' => null],
        ];
        StaffRole::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_roles');
    }
}
