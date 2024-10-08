<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product_photo extends Model
{
    protected $table = 'product_photo';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'photo_index',
        'photo',
    ];

}
