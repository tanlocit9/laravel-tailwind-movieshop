<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->comment("Mã người dùng");
            $table->string('name')->comment("Tên người dùng");
            $table->string('email')->comment("Email người dùng")->unique();
            $table->string('id_card_number', 12)->comment("CMND/Thẻ căn cước người dùng")->unique();
            $table->string('password')->comment("người dùng password");
            $table->string('phone_number', 13)->comment("SĐT người dùng");
            $table->integer('log_count')->comment("Số lần người dùng đăng nhập")->default(0);
            $table->string('social_id')->comment("Mã mạng xã hội người dùng")->nullable();
            $table->string('social_type')->comment("Loại mạng xã hộingười dùng")->nullable();
            $table->foreignId('role_id')->comment("Mã vai trò người dùng")->default(2)->constrained('user_roles')->onDelete('cascade');
            $table->timestamps();
        });
        $user = User::create([
            'name' => 'Loc',
            'email' => 'admin@gmail.com',
            'id_card_number' => '025847663',
            'phone_number' => '084123456789',
            'password' => Hash::make('123456789'),
            'role_id' => 1,
        ]);
        $user = User::create([
            'name' => 'Loc',
            'email' => 'test@gmail.com',
            'id_card_number' => '025847664',
            'phone_number' => '084123456789',
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
        Schema::dropIfExists('users');
    }
}
