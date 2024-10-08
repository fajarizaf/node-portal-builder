<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $table = 'site';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'domain_name',
        'site_id',
        'domain_id',
        'logo',
        'screenshot',
        'status_id',
    ];

}
