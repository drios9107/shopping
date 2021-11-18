<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ShoeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'color' => $this->faker->colorName(),
            'brand_id' => $this->faker->numberBetween(1, 10),
            'size' => $this->faker->randomFloat(1, 20, 47),
            'price' => $this->faker->randomFloat(2, 1, 10),
        ];
    }
}
