<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Rooms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id()->comment("Mã phòng");
            $table->string('name')->comment("Tên phòng");
            $table->integer('slot')->comment("Số lượng ghế")->default(60);

            $table->foreignId('theater_id')->comment("Mã rạp phim")->constrained('theaters')->onDelete('cascade');
            $table->foreignId('room_status_id')->comment("Mã trạng thái phòng")->default(1)->constrained('room_statuses')->onDelete('cascade');
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
        Schema::dropIfExists('rooms');
    }
}
