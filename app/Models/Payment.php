<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'payed_at',
        'order_id',
        'requestId',
        'requestStatus',
        'requestDate',
    ];
    protected $dates = [
        'payed_at',
        'requestDate',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
