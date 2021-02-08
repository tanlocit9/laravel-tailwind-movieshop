<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Movies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('movie_name');
            $table->string('movie_description')->default("The movie do not have description");
            $table->time('movie_duration');
            $table->integer('age_limit')->nullable();
            $table->date('release_day')->comment('ngay ra mat');
            $table->string('poster_path')->comment('duong dan hinh');

            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
