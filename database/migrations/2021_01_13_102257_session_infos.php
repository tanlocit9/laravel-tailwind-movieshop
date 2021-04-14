<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SessionInfos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_infos', function (Blueprint $table) {
            $table->id();
            $table->timestamp("time_start")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp("time_end")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->time("time_total")->default(0001-01-01);

            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('session_infos');
    }
}
