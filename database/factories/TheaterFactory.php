<?php

namespace Database\Factories;

use App\Models\Theater;
use Illuminate\Database\Eloquent\Factories\Factory;

class TheaterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Theater::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'theater_name'=>$this->faker->name,
            'theater_address'=>$this->faker->address,
            'theater_phone'=>$this->faker->phoneNumber,
        ];
    }
}
