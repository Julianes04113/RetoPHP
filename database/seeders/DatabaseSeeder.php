<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Image;
use App\Models\Cart;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $users = User::factory(20)
        ->create()
        ->each(function ($user) {
            $image = Image::factory()
              ->user()
              ->make();
            $user->image()->save($image);
        });

        $orders = Order::factory(10)
          ->make()
          ->each(function ($order) use ($users) {
            $order->customer_id = $users->random()->id;
            $order->save();
          });

        //Cuando se seedea orders pero no tienen requestIds, ¿se creará un portal al infierno?
        $carts = Cart::factory(10)->create();

        $products = Product::factory(50)
          ->create()
          ->each(function ($product) use ($orders, $carts) {
            $order = $orders->random();
            $order->products()->attach([
              $product->id => ['quantity' => mt_rand(1, 3)]
            ]);
            $cart = $carts->random();
            $cart->products()->attach([
              $product->id => ['quantity' => mt_rand(1, 3)]
            ]);
            $images = Image::factory(mt_rand(2, 4))->make();
            $product->images()->saveMany($images);
          });
    }
}
