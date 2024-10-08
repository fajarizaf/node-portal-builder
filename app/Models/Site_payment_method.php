<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site_payment_method extends Model
{
    protected $table = 'site_payment_method';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'payment_method_name',
        'channel_id',
        'payment_method_logo',
        'is_active'
    ];

}
