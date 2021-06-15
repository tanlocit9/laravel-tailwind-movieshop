<?php

use App\Models\BillStatus;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status_name',30);
            $table->string('status_description')->nullable();
        });
        $data =[
            ['status_name'=>'new'],
            ['status_name'=>'canceled'],
            ['status_name'=>'payed']
        ];
        BillStatus::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill_statuses');
    }
}
