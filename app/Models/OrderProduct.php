<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'order_id',
        'user_id',
        'product_id',
        'total_price',
        'quantity',
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        // dd(45);
        return $this->hasMany(User::class, 'id','user_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'id','product_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'id','order_id');
    }

}
