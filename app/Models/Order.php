<?php

namespace App\Models;

use App\Models\seller\Food;
use App\Models\seller\Restaurant;
use App\Models\seller\Seller;
use App\Models\User\Cart;
use App\Models\User\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart_id',
        'restaurant_id',
        'seller_id',
        'user_id',
        'price',
        'status',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function sellers()
    {
        return $this->belongsToMany(Seller::class);
    }

    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }


    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function scopeUpdateStatus($query , $orderId , $status)
    {
        return $query->where('id' ,$orderId )->update(['status' => $status]);
    }

    public function scopeCheckStatus($query)
    {
        return $query->whereIn('status' , ['در حال بررسی', 'در حال آماده سازی' , 'ارسال به مقصد']);
    }

    public function scopeCartIdByOrderId($query , $orderId )
    {
        return $query->where('id' , $orderId)->pluck('cart_id');
    }

    public function scopeGetOrderWithStatus($query , $orderStatus )
    {
        return $query->where('status' ,$orderStatus);
    }



}
