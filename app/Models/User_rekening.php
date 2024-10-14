<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_rekening extends Model
{
    protected $table = 'user_rekening';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'bank_id',
        'account_name',
        "account_number"
    ];

}
