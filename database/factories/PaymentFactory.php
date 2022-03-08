<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Payment;

class PaymentFactory extends Factory
{
    use HasFactory;

    protected $model = Payment::class;

    public function definition()
    {
        return [
            'amount' => $this->faker->numberBetween($min=1, $max=50),
            'payed_at' => $this->faker->dateTimeBetween($startDate = '-1 year', $endDate = 'now', $timezone = null),
        ];
    }
}
