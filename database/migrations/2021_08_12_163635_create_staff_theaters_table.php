<?php

use App\Models\Theater;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTheatersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_theaters', function (Blueprint $table) {
            $table->foreignId('staff_id')->comment("Mã nhân viên")->constrained('staffs')->onDelete('cascade');
            $table->foreignId('theater_id')->comment("Mã rạp phim")->constrained('theaters')->onDelete('cascade');
            $table->primary(array('theater_id', 'staff_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('staff_theaters');
    }
}
