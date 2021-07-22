<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Calendars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendars', function (Blueprint $table) {
            $table->id()->comment("Mã suất chiếu");
            $table->time('time_start')->comment("Thời gian bắt đầu");
            $table->integer('slot_remain')->comment("Lượng ghế còn lại")->default(100);

            $table->foreignId('room_id')->comment("Mã phòng")->constrained('rooms')->onDelete('cascade');
            $table->foreignId('calendar_status_id')->comment("Mã trạng thái suất chiếu")->default(1)->constrained('calendar_statuses')->onDelete('cascade');
            $table->foreignId('schedule_id')->comment("Mã trạng thái lịch chiếu")->constrained('schedules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calendars');
    }
}
