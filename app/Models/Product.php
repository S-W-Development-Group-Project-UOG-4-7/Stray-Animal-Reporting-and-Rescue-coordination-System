<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock_quantity',
        'category',
        'image',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];
}
