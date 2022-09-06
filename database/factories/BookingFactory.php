<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

            return [
                'user_id' => rand(1,10),
                'status_id' => rand(1,2),
                'arrived'=>now(),
            ];

    }
}
