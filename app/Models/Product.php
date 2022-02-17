<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Image;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'description',
        'price',
        'stock',
        'status',
    ];

    public function carts(){
        return $this->morphedByMany(Cart::class, 'productable')->withPivot('quantity');
    }

    public function orders(){
        return $this->morphedByMany(Order::class, 'productable')->withPivot('quantity');
    }
    public function images(){
        return $this->morphMany(Image::class,'imageable');
    }

}
