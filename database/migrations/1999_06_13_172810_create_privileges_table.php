<?php

use App\Models\Privilege;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivilegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privileges', function (Blueprint $table) {
            $table->foreignId('staff_role_id')->comment("Mã vai trò nhân viên")->constrained('staff_roles')->onDelete('cascade');
            $table->foreignId('staff_id')->comment("Mã nhân viên")->constrained('staffs')->onDelete('cascade');
            $table->primary(array('staff_role_id', 'staff_id'));
        });
        Privilege::create([
            'staff_role_id' => 1,
            'staff_id' => 1,
        ]);
        Privilege::create([
            'staff_role_id' => 5,
            'staff_id' => 2,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privileges');
    }
}
