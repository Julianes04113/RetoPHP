<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Product;

class ProductFactory extends Factory
{

    protected $model = Product::class;

    use HasFactory;

    public function definition()
    {
        return [
            'title' => $this ->faker->sentence(3),
            'description' => $this ->faker->text(250),
            'price' => $this ->faker->numberBetween($min=500,$max=1000000),
            'stock' => $this ->faker->numberBetween($min=1,$max=150),
            'status' => $this ->faker->optional(0.1,'available')->randomElement(['available','unavailable']),
        ];
    }
}
