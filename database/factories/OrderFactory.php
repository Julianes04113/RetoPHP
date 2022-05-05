<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Order;

class OrderFactory extends Factory
{
    use HasFactory;
    protected $model = Order::class;

    public function definition()
    {
        return [
            'status' => $this->faker->randomElement(['PENDING', 'APPROVED', 'REJECTED']),
            'requestId' => $this->faker->randomNumber(5),
            'amount' => $this->faker->randomNumber(5),
        ];
    }
}
