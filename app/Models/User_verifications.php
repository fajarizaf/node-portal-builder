<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_verifications extends Model
{
    protected $table = 'user_verification';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'nama',
        'nomor_ktp',
        'dokument_ktp',
        'dokument_buku_tabungan',
        'status_id'
    ];

}
