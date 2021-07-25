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
            $table->id()->comment("Mã trạng thái lịch chiếu");
            $table->string('status',30)->comment("Tên trạng thái lịch chiếu");
            $table->string('description')->comment("Mô tả trạng thái")->nullable();
        });
        $data =[
            ['status'=>'Draft'],
            ['status'=>'Active'],
            ['status'=>'Canceled'],
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
