<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_invoices_item extends Model
{
    protected $table = 'user_invoices_item';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'invoice_id',
        'order_id',
        'user_id',
        'item_name',
        'qty',
        'amount',
    ];

}
