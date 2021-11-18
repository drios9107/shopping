<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ShoeUsageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'shoe_id' => $this->faker->numberBetween(1, 10),
            'usage_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
