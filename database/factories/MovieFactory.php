<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' =>$this->faker->name,
            'description'=>$this->faker->text,
            'duration'=>$this->faker->time,
            'release_date'=>$this->faker->date,
            'age_limit'=>$this->faker->numberBetween(8,18),
            'poster'=>'TTM_poster.jpg',
            'country_id'=>$this->faker->numberBetween(1,150),
        ];
    }
}
