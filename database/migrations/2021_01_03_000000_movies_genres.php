<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MoviesGenres extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genre_movie', function (Blueprint $table) {
            $table->foreignId('genre_id')->comment("Mã thể loại")->constrained('genres')->onDelete('cascade');
            $table->foreignId('movie_id')->comment("Mã phim")->constrained('movies')->onDelete('cascade');
            $table->boolean('is_main')->comment("Thể loại chính T/F Phụ/Chính")->default(0);
            $table->primary(array('movie_id', 'genre_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_movie');
    }
}
