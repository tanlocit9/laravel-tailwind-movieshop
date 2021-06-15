<?php

use App\Models\ScheduleStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status_name',30);
            $table->string('status_description')->nullable();
        });
        $data =[
            ['status_name'=>'draft'],
            ['status_name'=>'active'],
            ['status_name'=>'canceled'],
        ];
        ScheduleStatus::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_statuses');
    }
}
