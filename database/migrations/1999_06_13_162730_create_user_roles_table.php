<?php

use App\Models\UserRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id()->comment("Mã vai trò người dùng");
            $table->string('role', 30)->comment("Tên vai trò người dùng trong hệ thống");
            $table->string('description')->comment("Mô tả vai trò")->nullable();
        });
        $data = [
            ['role' => 'admin', 'description' => null],
            ['role' => 'customer', 'description' => null],
        ];
        UserRole::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_roles');
    }
}
