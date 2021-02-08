<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Theater;

class Theaters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('theaters', function (Blueprint $table) {
            $table->id();
            $table->string('theater_name');
            $table->string('theater_address');
            $table->string('theater_phone')->default('0368823899');
            $table->timestamps();
        });
        $theater = Theater::create([
            'theater_name' => 'Sư phạm',
            'theater_address' => '280 An Dương Vương',
        ]);
        $now = date('Y-m-d H:i:s');
        $data = [
            ['created_at' => $now, 'updated_at' => $now, 'theater_name' => 'Công nghệ Sài Gòn', 'theater_address' => '180 Cao Lỗ'],
            //...
        ];
        Theater::insert($data);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('theaters');
    }
}
