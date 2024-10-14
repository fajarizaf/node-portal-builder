<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_witdraws extends Model
{
    protected $table = 'user_witdraw';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'payment_method',
        'bank',
        'no_rek',
        'nama_rek',
        'amount',
        'notes',
        'status_id'
    ];

}
