<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movies = Movie::factory()
                    ->count(5)
                    ->create();
        foreach($movies as $movie){
            $arr=[];
            $main_id=rand(1,21);
            $movie->genres()->attach($main_id,['is_main'=>1]);
            array_push($arr,$main_id);
            for ($i=0; $i < rand(1,10); $i++) {
                $sub_id=rand(1,21);
                if(!in_array($sub_id, $arr)){
                    $movie->genres()->attach($sub_id,['is_main'=>0]);
                    array_push($arr,$sub_id);
                }
            }
        }
    }
}
