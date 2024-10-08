<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site_banks extends Model
{
    protected $table = 'site_banks';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'bank_name',
        'bank_logo',
    ];

}
