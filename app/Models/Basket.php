<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['user_id', 'service_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public static function userBasketAllServices()
    {
        return auth()->user()->baskets();
    }

    public static function userBasketService($id)
    {
        return self::userBasketAllServices()->where('service_id', $id)->first();
    }

    public function getPriceAttribute()
    {
        return (int)$this->product->price;
    }
}

