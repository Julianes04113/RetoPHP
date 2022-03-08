<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Cart;

class CartFactory extends Factory
{
    use HasFactory;

    protected $model = Cart::class;

    public function definition()
    {
        return [
            //
        ];
    }
}
