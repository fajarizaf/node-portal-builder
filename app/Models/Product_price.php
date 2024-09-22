<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_price extends Model
{
    protected $table = 'product_price';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'product_id',
        'product_type',
        'billing_cycle',
        'price',
        'is_enable',
    ];

}
