<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SeatFactory extends Factory
{
    private static $number = 1;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'number' => self::$number++
        ];
    }
}
