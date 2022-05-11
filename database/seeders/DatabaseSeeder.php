<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use App\Models\Image;
use App\Models\Cart;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache'); //necesario por ciertos bug, resetea el cache
      
        Permission::create([
          'name' => 'buy products'
        ]);
        Permission::create([
          'name' => 'update profile'
        ]);
        Permission::create([
          'name' => 'have a cart'
        ]);
        Permission::create([
          'name' => 'create an order'
        ]);
        Permission::create([
          'name' => 'check payments'
        ]);
        Permission::create([
          'name' => 'admin products'
        ]);
        Permission::create([
          'name' => 'admin users'
        ]);
        Permission::create([
          'name' => 'import information'
        ]);
        Permission::create([
          'name' => 'export information'
        ]);

        $adminRole = Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());
        $customerRole = Role::create(['name' => 'customer'])->givePermissionTo([
          'buy products',
          'update profile',
          'have a cart',
          'create an order',
          'check payments'
        ]);
      
        $julian = User::create([
          'name' => 'Julian Arenas',
          'email' => 'julian_99_92@hotmail.com',
          'password' => 'Juli133694',
          'admin_since' => now(),
          'email_verified_at' => now(),
        ]);
        $julian->assignRole('admin');

        $users = User::factory(20)
        ->create()
        ->each(function ($user) {
            $image = Image::factory()
              ->user()
              ->make();
            $user->image()->save($image);
            $user->assignRole('customer');
        });
        
        $orders = Order::factory(10)
          ->make()
          ->each(function ($order) use ($users) {
            $order->customer_id = $users->random()->id;
            $order->save();
          });

        //Cuando se seedea orders pero no tienen requestIds, ¿se creará un portal al infierno en las colas?
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
