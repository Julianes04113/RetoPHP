<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this ->faker->sentence(3),
            'description' => $this ->faker->paragraph(1),
            'price' => $this ->faker->numberBetween($min=500,$max=1000000),
            'stock' => $this ->faker->randomDigit(),
            'status' => $this ->faker->randomElement(['available','unavailable']),
        ];
    }
}
