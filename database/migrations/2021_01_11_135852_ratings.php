<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ratings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->foreignId('user_id')->comment("Mã người dùng")->constrained('users')->onDelete('cascade');
            $table->foreignId('movie_id')->comment("Mã phim")->constrained('movies')->onDelete('cascade');
            $table->float('star')->comment("Số sao đánh giá");
            $table->string('comment')->comment("Bình luận")->nullable();
            $table->timestamps();

            $table->primary(array('movie_id', 'user_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
