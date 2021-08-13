<?php

use App\Models\StaffStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status', 30)->comment("Tên trạng thái nhân viên");
            $table->string('description')->comment("Mô tả trạng thái")->nullable();
        });
        $data =[
            ['status'=>'active'],
            ['status'=>'deactive'],
        ];
        StaffStatus::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_statuses');
    }
}
