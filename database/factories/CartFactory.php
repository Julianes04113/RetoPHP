<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Cart;


class CartFactory extends Factory
{

    protected $model = Cart::class;

    use HasFactory;
    
    public function definition()
    {
        return [
            //
        ];
    }
}
