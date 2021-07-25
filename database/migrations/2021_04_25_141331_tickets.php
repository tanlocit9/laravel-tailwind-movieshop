<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id()->comment("Mã vé");
            $table->integer('total_price')->comment("Tổng giá tiền")->default(0);
            $table->foreignId('user_id')->comment("Mã người dùng")->constrained('users')->onDelete('cascade');
            $table->foreignId('calendar_id')->comment("Mã suất chiếu")->constrained('calendars')->onDelete('cascade');
            $table->foreignId('paymode_id')->comment("Mã phương thức thanh toán")->default(1)->constrained('pay_modes')->onDelete('cascade');
            $table->foreignId('ticket_status_id')->comment("Mã trạng thái vé")->default(1)->constrained('ticket_statuses')->onDelete('cascade');

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
        Schema::dropIfExists('tickets');
    }
}
