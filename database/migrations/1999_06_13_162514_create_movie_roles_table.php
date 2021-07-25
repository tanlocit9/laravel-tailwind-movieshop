<?php

use App\Models\MovieRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovieRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_roles', function (Blueprint $table) {
            $table->id()->comment("Mã vai trò trong phim");
            $table->string('role', 30)->comment("Vài trò trong phim");
            $table->string('description')->comment("Mô tả vai trò")->nullable();
        });
        $data = [
            ['role' => 'Main actor', 'description' => null],
            ['role' => 'Support actor', 'description' => null],
        ];
        MovieRole::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movie_roles');
    }
}
