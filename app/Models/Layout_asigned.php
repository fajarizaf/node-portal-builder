<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layout_asigned extends Model
{
    protected $table = 'layout_asigned';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'site_id',
        'layout_id',
    ];

}
