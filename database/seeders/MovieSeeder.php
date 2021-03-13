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
            $arr_genres=[];
            $arr_actors=[];
            $main_id=rand(1,21);
            $movie->genres()->attach($main_id,['is_main'=>1]);
            array_push($arr_genres,$main_id);
            for ($i=0; $i < rand(1,10); $i++) {
                $sub_id=rand(1,21);
                if(!in_array($sub_id, $arr_genres)){
                    $movie->genres()->attach($sub_id,['is_main'=>0]);
                    array_push($arr_genres,$sub_id);
                }
            }
            for ($j=0; $j < rand(1,10); $j++) {
                $id=rand(1,20);
                if(!in_array($sub_id, $arr_actors)){
                    $movie->actors()->attach($id,['role_id'=>rand(3,4)]);
                    array_push($arr_actors,$id);
                }
            }
        }

    }
}
