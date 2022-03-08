<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Image;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $dates = [
        'admin_since'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'costumer_id');
    }

    public function payments()
    {
        return $this->HasManyThrough(Payment::class, Order::class, 'customer_id');
    }//Payments debe tener una llave foránea del modelo intermedio (order)

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function scopeFilter(Builder $query, string $keyword)
    {
        if (!empty($keyword)) {
            return $query->where(function ($query) use ($keyword) {
                $query->where('name', 'LIKE', '%'.$keyword.'%')
                      ->orWhere('email', 'LIKE', '%'.$keyword.'%');
            });
        }
    }
}
