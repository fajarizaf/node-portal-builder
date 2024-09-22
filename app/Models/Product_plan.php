<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_plan extends Model
{
    protected $table = 'product_plan';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'product_group_id',
        'product_plan_name',
        'product_plan_code',
        'product_plan_desc',
        'product_plan_link',
        'apply_tax',
        'product_stock',
        'is_hidden',
        'product_template_email',
    ];

}
