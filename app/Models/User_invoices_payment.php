<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_invoices_payment extends Model
{
    protected $table = 'user_invoices_payment';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'invoice_id',
        'payment_method',
        'trx_id',
        'trx_status'
    ];

}
