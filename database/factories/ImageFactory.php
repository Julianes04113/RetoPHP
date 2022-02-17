<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Image;

class ImageFactory extends Factory
{
  
    protected $model = Image::class;

    use HasFactory;
    
    public function definition()
    {
        $fileName=$this->faker->numberBetween(1,10) . '.jpg';

        return [
            'path' => "images/products/{$fileName}"
        ];
    }
    public function user()
    {
        $fileName=$this->faker->numberBetween(1,2) . '.jpg';
        return $this->state([
            'path' => "images/users/{$fileName}"
        ]);
    }
}
