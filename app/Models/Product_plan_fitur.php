<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_plan_fitur extends Model
{
    protected $table = 'product_plan_fitur';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'key',
        'value',
    ];

}
