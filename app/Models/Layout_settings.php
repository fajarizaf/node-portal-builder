<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layout_settings extends Model
{
    protected $table = 'layout_settings';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'site_id',
        'key',
        'value'
    ];

}
