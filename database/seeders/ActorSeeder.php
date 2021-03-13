<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use \App\Models\Actor;
class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actor = Actor::factory()->count(20)->create();
    }
}
