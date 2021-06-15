<?php

use App\Models\MovieRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name',30);
            $table->string('role_description')->nullable();
        });
        $data = [
            ['role_name'=>'actor_main','role_description'=>null],
            ['role_name'=>'actor_support','role_description'=>null],
        ];
        MovieRole::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_roles');
    }
}
