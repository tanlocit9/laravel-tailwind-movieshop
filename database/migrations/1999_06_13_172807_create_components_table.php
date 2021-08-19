<?php

use App\Models\Component;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('components', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment("Tên thành phần");
            $table->string('description')->comment("Mô tả thành phần")->nullable();
        });

        $data = [
            ['name' => "movie"],
            ['name' => "user"],
            ['name' => "theater"],
            ['name' => "actor"],
            ['name' => "ticket"],
            ['name' => "schedule"],
            ['name' => "role"],
        ];
        Component::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('components');
    }
}
