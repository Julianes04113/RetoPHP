<?php

namespace App\Models;

use App\Models\User;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'customer_id',
        'requestId',
        'requestStatus',
        'amount'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }
    public function products()
    {
        return $this->morphToMany(Product::class, 'productable')->withPivot('quantity');
    }
    public function getTotalAttribute()
    {
        return $this->products->pluck('total')->sum();
    }
    public function scopeFilter(Builder $query)
    {
        return $query->where('customer_id', '==', 'user_id');
    }
}
