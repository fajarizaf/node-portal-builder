<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site_status extends Model
{
    protected $table = 'site_status';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'status_name',
        'status_code',
    ];

}
