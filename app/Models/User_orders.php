<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_orders extends Model
{
    protected $table = 'user_orders';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'order_number',
        'user_id',
        'customer_id',
        'sub_total',
        'tax_rate',
        'tax',
        'total',
        'status_id',
    ];

}
