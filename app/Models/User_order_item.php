<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_order_item extends Model
{
    protected $table = 'user_order_item';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'order_id',
        'product_id',
        'product_group_name',
        'product_plan_name',
        'promo',
        'billing_cycle',
        'unit_price',
        'qty',
    ];

}
