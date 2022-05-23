<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cover' => $this->faker->image('image', null, null, 'nightlife'),
            'name' => $this->faker->sentence('4'),
        ];
    }
}
