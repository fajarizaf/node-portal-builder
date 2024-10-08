<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Site_layout extends Model
{
    protected $table = 'site_layout';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'layout_name',
        'layout_thumbnail',
    ];

}
