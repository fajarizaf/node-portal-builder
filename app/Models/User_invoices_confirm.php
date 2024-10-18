<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_invoices_confirm extends Model
{
    protected $table = 'user_invoices_confirm';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'invoices_id',
        'pemilik_rekening',
        'nomor_rekening',
        "bukti_transfer"
    ];

}
