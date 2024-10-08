<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_asigned extends Model
{
    protected $table = 'product_asigned';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'site_id',
        'product_id',
    ];

}
