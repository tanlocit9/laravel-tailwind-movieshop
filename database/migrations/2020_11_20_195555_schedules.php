<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Schedules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id()->comment("Mã lịch chiếu");
            $table->date('date')->comment("Ngày chiếu");
            $table->foreignId('schedule_status_id')->comment("Mã trạng thái lịch chiếu")->default(1)->constrained('schedule_statuses')->onDelete('cascade');
            $table->foreignId('theater_id')->comment("Mã rạp phim")->constrained('theaters')->onDelete('cascade');
            $table->foreignId('movie_id')->comment("Mã phim")->constrained('movies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
