<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Build_status extends Model
{
    protected $table = 'build_status';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'domain_name',
        'build_link',
        'step',
        'step_status',
        'request',
        'response'
    ];

}
