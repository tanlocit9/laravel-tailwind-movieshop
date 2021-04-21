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
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->string('description')->nullable();
            $table->foreignId('type_id')->constrained('types')->onDelete('cascade');
        });
        $data =[
            ['type_id'=>2,'name'=>'Adult without membership','description'=>'Default ticket','price'=>'70000'],
            ['type_id'=>2,'name'=>'Adult with membership','description'=>'Membership ticket','price'=>'65000'],
            ['type_id'=>2,'name'=>'Couple','description'=>'Include 2 tickets','price'=>'150000'],
            ['type_id'=>3,'name'=>'Combo Solo','description'=>'1 popcorn + 1 coke (32 oz)','price'=>'72000'],
            ['type_id'=>3,'name'=>'Combo Dual','description'=>'1 popcorn + 2 coke (32 oz)','price'=>'83000'],
            ['type_id'=>3,'name'=>'Combo Family','description'=>'2 popcorn + 4 coke (32 oz) + 2 snacks','price'=>'179000'],
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
