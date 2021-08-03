<?php

use App\Models\Staff;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment("Tên nhân viên")->default('default');
            $table->string('email')->comment("Email nhân viên")->unique();
            $table->string('password')->comment("Mật khẩu nhân viên")->default('default');
            $table->foreignId('staff_role_id')->comment("Mã vai trò")->nullable()->constrained('staff_roles')->onDelete('cascade');
            $table->foreignId('theater_id')->comment("Mã rạp phim")->nullable()->constrained('theaters')->onDelete('cascade');
            $table->timestamps();
        });
        Staff::create([
            'name' => 'Loc',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
