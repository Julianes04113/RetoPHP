<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
       $Users= User::factory(10)->create();
       $products = Product::factory(50)->create();
    }
}
