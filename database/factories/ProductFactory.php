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
            'code'=>$this->faker->unique()->numerify('MERCA#####'),
            'title' => $this ->faker->sentence(3),
            'description' => $this ->faker->text(250),
            'price' => $this ->faker->numberBetween($min=500,$max=1000000),
            'stock' => $this ->faker->numberBetween($min=1,$max=150),
            'status' => $this ->faker->randomElement(['available','unavailable']),
        ];
    }
}
