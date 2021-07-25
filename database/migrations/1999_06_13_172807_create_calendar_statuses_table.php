<?php

use App\Models\CalendarStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar_statuses', function (Blueprint $table) {
            $table->id()->comment("Mã trạng thái suất chiếu");
            $table->string('status',30)->comment("Tên trạng thái suất chiếu");
            $table->string('description')->comment("Mô tả trạng thái")->nullable();
        });
        $data = [
            ['status' => 'New'],
            ['status' => 'Active'],
            ['status' => 'Upcomming'],
            ['status' => 'Showing'],
        ];
        CalendarStatus::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calendar_statuses');
    }
}
