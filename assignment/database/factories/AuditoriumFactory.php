<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AuditoriumFactory extends Factory
{
    private static $number = 'A';

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => self::$number++
        ];
    }
}
