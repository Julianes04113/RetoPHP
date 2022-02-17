<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Order;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    use HasFactory;

    protected $fillable = [
        'status',
    ];

    public function definition()
    {
        return [
            'status' => $this->faker->randomElement(['pending', 'paid', 'shipped'])
        ];
    }
}
