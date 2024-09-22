<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_group extends Model
{
    protected $table = 'product_group';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'product_group_name',
        'product_group_link',
    ];

}
