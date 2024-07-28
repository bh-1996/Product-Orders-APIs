<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'price',
        'created_at',
        'updated_at',
    ];


    public function usersProducts()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
