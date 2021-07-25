<?php

use App\Models\PayMode;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PayModes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_modes', function (Blueprint $table) {
            $table->id()->comment("Mã phương thức thanh toán");
            $table->string('mode')->comment("Phương thức thanh toán");
            $table->string('description')->comment("Mô tả phương thức thanh toán");
        });
        $data = [
            ['mode' => "Direct","description"=> "Direct payment"],
            ['mode' => "Momo","description"=> "Momo payment"]
        ];
        PayMode::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pay_modes');
    }
}
