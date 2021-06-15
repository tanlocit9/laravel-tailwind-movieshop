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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number',13);
            $table->rememberToken();
            $table->integer('log_count')->default(0);
            $table->string('social_id')->nullable();
            $table->string('social_type')->nullable();
            $table->foreignId('role_id')->default(2)->constrained('user_roles')->onDelete('cascade');
            $table->timestamps();
        });
        $user = User::create([
            'name' => 'Loc',
            'email' => 'admin@gmail.com',
            'phone_number' => '084123456789',
            'password' => Hash::make('123456789'),
            'role_id'=>1,
        ]);
        $user = User::create([
            'name' => 'Loc',
            'email' => 'test@gmail.com',
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
