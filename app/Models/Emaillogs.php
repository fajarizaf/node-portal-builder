<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emaillogs extends Model
{
    protected $table = 'emaillogs';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'to',
        'subject',
        'module_id',
        'req',
        'res',
    ];

}
