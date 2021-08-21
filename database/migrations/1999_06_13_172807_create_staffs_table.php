<?php

use App\Models\Staff;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment("Tên nhân viên")->default('default');
            $table->string('email')->comment("Email nhân viên")->unique();
            $table->string('password')->comment("Mật khẩu nhân viên")->default('default');
            $table->string('phone_number',13)->comment("Số điện thoại nhân viên")->default('0368823899');
            $table->string('image_avatar')->comment("Đường dẫn lưu trữ hình nhân viên")->nullable();
            $table->string('image_id_card_front')->comment("Mặt trước chứng minh nhân dân")->nullable();
            $table->string('image_id_card_back')->comment("Mặt sau chứng minh nhân dân")->nullable();
            $table->string('address')->comment("Địa chỉ nhân viên")->nullable();
            $table->foreignId('staff_status_id')->comment("Mã trạng thái nhân viên")->constrained('staff_statuses')->onDelete('cascade');
            $table->timestamps();
        });
        Staff::create([
            'name' => 'Loc',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('123456789'),
            'staff_status_id'=>1
        ]);

        Staff::create([
            'name' => 'Loc',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('123456789'),
            'staff_status_id'=>1
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staffs');
    }
}
