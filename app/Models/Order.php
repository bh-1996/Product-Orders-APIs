<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'order_id',
        'user_id',
        'product_id',
        'total_price',
        'quentity',
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'id','product_id');
    }
}
