<?php

use App\Models\Price;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Prices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id()->comment("Mã giá tiền");
            $table->string('name')->comment("Tên giá tiền");
            $table->integer('price')->comment("Giá");
            $table->string('description')->comment("Mô tả giá tiền")->nullable();
            $table->foreignId('price_type_id')->comment("Mã loại giá tiền")->constrained('price_types')->onDelete('cascade');
        });
        $data = [
            ['price_type_id' => 1, 'name' => 'Adult with membership', 'description' => 'Membership ticket', 'price' => '70000'],
            ['price_type_id' => 1, 'name' => 'Adult with membership', 'description' => 'Membership ticket', 'price' => '70000'],
            ['price_type_id' => 1, 'name' => 'Adult with membership', 'description' => 'Membership ticket', 'price' => '70000'],
            ['price_type_id' => 2, 'name' => 'Combo Solo', 'description' => '1 popcorn + 1 coke (32 oz)', 'price' => '72000'],
            ['price_type_id' => 2, 'name' => 'Combo Dual', 'description' => '1 popcorn + 2 coke (32 oz)', 'price' => '83000'],
            ['price_type_id' => 2, 'name' => 'Combo Family', 'description' => '2 popcorn + 4 coke (32 oz) + 2 snacks', 'price' => '179000'],
        ];
        Price::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
}
