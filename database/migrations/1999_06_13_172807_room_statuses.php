<?php

use App\Models\RoomStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RoomStatuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_statuses', function (Blueprint $table) {
            $table->id()->comment("Mã trạng thái phòng");
            $table->string('status',30)->comment("Tên trạng thái phòng");
            $table->string('description')->comment("Mô tả trạng thái")->nullable();
        });
        $data=[
            ['status'=>'empty'],
            ['status'=>'spare'],
            ['status'=>'full'],
        ];
        RoomStatus::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_statuses');
    }
}
