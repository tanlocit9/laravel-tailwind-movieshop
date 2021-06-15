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
            $table->id();
            // $table->foreignId('movie_id')->constrained('movies')->onDelete('cascade');
            // $table->foreignId('theater_id')->constrained('theaters')->onDelete('cascade');

            $table->time('time_start');
            $table->integer('slot_remain')->default(40);

            $table->foreignId('price_id')->constrained('prices')->onDelete('cascade');
            $table->foreignId('calendar_status_id')->default(1)->constrained('calendar_statuses')->onDelete('cascade');
            $table->foreignId('schedule_id')->constrained('schedules')->onDelete('cascade');
            // $table->primary(array('id','movie_id', 'theater_id', 'room_id'));
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
