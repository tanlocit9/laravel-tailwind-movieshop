<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(ActorMovieSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ActorSeeder::class);
        $this->call(MovieSeeder::class);
        $this->call(TheaterSeeder::class);
        $this->call(ScheduleSeeder::class);


    }
}
