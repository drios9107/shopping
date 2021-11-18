<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'shoe_id' => $this->faker->randomNumber(1, 3),
            'amount' => $this->faker->numberBetween(1, 10),
            'value' => $this->faker->randomFloat(2, 1, 10),
            'user_id' => 1,
        ];
    }
}
