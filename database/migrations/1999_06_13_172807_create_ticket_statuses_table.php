<?php

use App\Models\TicketStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_statuses', function (Blueprint $table) {
            $table->id()->comment("Mã trạng vé");
            $table->string('status',30)->comment("Tên trạng thái vé");
            $table->string('description')->comment("Mô tả trạng thái")->nullable();
        });
        $data =[
            ['status'=>'New'],
            ['status'=>'Canceled'],
            ['status'=>'Payed']
        ];
        TicketStatus::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_statuses');
    }
}
