<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_invoices_transaction extends Model
{
    protected $table = 'user_invoices_transaction';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'invoices_id',
        'gateway',
        'channel',
        'txnid',
        'amount_in',
        'amount_out',
        'fee',
        'amount_witdraw',
        'payment_status'
    ];

}
