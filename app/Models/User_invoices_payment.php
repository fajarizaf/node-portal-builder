<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_invoices_payment extends Model
{
    protected $table = 'user_invoices_payment';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'invoices_id',
        'payment_method',
        'payment_expired',
        'payment_references',
        'payment_virtualaccount',
        'payment_amount',
        'fee'
    ];

}
