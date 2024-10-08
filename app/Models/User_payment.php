<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_payment extends Model
{
    protected $table = 'user_payment';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'payment_id',
        'site_id'
    ];

}
