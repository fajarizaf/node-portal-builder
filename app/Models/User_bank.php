<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_bank extends Model
{
    protected $table = 'user_bank';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'bank_id',
        'site_id',
        'account_name',
        "account_number",
        "notes"
    ];

}
