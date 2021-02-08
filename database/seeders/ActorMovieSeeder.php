<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use \App\Models\Movie;
use \App\Models\Actor;
use \App\Models\MovieActor;
class ActorMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movie = Movie::factory()
                    ->count(5)
                    ->create();
        $ActorMovie = Actor::factory()
            ->hasAttached($movie, function(){
                return ['role'=> Str::random(5)];
            })
            ->count(3)
            ->create();
    }
}
