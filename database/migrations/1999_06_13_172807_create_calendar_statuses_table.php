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
            $table->id();
            $table->string('status_name', 30);
            $table->string('status_description')->nullable();
        });
        $data = [
            ['status_name' => 'new'],
            ['status_name' => 'active'],
            ['status_name' => 'upcomming'],
            ['status_name' => 'showing'],
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
