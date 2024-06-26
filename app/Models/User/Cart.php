<?php

namespace App\Models\User;

use App\Models\Order;
use App\Models\seller\Food;
use App\Models\seller\Restaurant;
use App\Models\seller\Seller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'food_id',
        'restaurant_id',
        'count',
        'price',
        'seller_id',
    ];

    public function order(){
        return $this->hasOne(Order::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

    public function foods()
    {
        return $this->belongsToMany(Food::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
       return $this->hasMany(Comment::class);
    }

    public function scopeCheckCartId(Builder $query , int $cartId)
    {
        return $query->where('id' , $cartId);
    }

    public function scopeCheckCartRestaurantId($query , $restaurantId)
    {
        return $query->where('restaurant_id' , $restaurantId);
    }



}
