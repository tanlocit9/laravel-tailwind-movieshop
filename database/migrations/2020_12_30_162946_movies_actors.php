<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MoviesActors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actor_movie', function (Blueprint $table) {
            $table->foreignID('movie_id')->comment("Mã phim")->constrained()->onDelete('cascade');
            $table->foreignID('actor_id')->comment("Mã diễn viên")->constrained()->onDelete('cascade');
            $table->foreignID('role_id')->comment("Mã vai trò phim")->constrained('movie_roles')->onDelete('cascade');
            $table->primary(array('movie_id', 'actor_id'));

            // $table->string('character');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actor_movie');
    }
}
