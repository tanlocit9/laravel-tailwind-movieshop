<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_infos', function (Blueprint $table) {
            $table->string('name')->comment("Tên vé");
            $table->string('seat')->comment("Vị trí ghế");
            $table->string('amount')->comment("Số lượng vé");
            $table->foreignId('ticket_id')->comment("Mã vé")->constrained('tickets')->onDelete('cascade');
            $table->foreignId('price_id')->comment("Mã giá")->nullable()->constrained('prices')->onDelete('cascade');
            $table->primary(array('ticket_id', 'price_id'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_infos');
    }
}
