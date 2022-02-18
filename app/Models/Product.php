<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Image;
use Illuminate\Database\Eloquent\Builder;

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

    public function scopeFilter(Builder $query, string $keyword){
        
        if (!empty($keyword)){
            return $query->where(function($query) use($keyword) {
                $query->where('title','LIKE','%'.$keyword.'%')
                      ->orWhere('description','LIKE','%'.$keyword.'%');
            });
        }
    }

}
