<?php

use App\Models\PriceType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_types', function (Blueprint $table) {
            $table->id()->comment("Mã loại giá tiền");
            $table->string('type')->comment("Loại giá tiền");
        });
        $data =[
            ['type'=>'ticket'],
            ['type'=>'food']
        ];
        PriceType::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('price_types');
    }
}
