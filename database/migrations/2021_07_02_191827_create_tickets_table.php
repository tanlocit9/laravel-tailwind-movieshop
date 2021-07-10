<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->string('seat', 2);
            $table->integer('price');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('bill_id')->constrained('bills')->onDelete('cascade');

            $table->foreignId('paymode_id')->nullable()->constrained('pay_modes')->onDelete('cascade');
            $table->timestamps();
            $table->primary(array('user_id', 'bill_id'));
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
