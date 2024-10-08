<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_orders extends Model
{
    protected $table = 'user_order';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'order_number',
        'user_id',
        'seller_id',
        'sub_total',
        'tax_rate',
        'tax',
        'total',
        'order_notes',
        'domain_tipe',
        'domain',
        'status_id',
    ];

}
