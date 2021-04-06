<?php

use App\Models\Movie;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Movies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->default("The movie do not have description");
            $table->string('duration');
            $table->integer('age_limit');
            $table->string('release_date');
            $table->string('poster');

            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade');
            $table->timestamps();
        });
        // $now = date('Y-m-d H:i:s');
        // $data = [
        //     ['created_at' => now(), 'updated_at' => now(),'country_id'=>1,'type_id'=>1, 'title' => 'Công nghệ Sài Gòn', 'description' => '','duration'=>'1:30:00', 'age_limit'=>16, 'release_date'=>"22/12/1999",'poster'=>"TTM_poster.jpg"],
        //     //...
        // ];
        // Movie::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
