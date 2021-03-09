<?php

use App\Models\Role;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Roles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_type');
            $table->string('role_name');
        });
        $data = [
            ['role_type'=>'system', 'role_name'=>'admin'],
            ['role_type'=>'system', 'role_name'=>'customer'],
            ['role_type'=>'movie', 'role_name'=>'actor_main'],
            ['role_type'=>'movie', 'role_name'=>'actor_suport'],
        ];
        Role::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
