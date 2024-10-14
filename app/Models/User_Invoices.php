<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_invoices extends Model
{
    protected $table = 'user_invoices';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'invoices_type',
        'invoices_date',
        'invoices_duedate',
        'invoices_datepaid',
        'tax',
        'sub_total',
        'total',
        'is_publish',
        'status_id',
    ];

}
