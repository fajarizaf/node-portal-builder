<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template_emails extends Model
{
    protected $table = 'template_emails';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'template_name',
        'template_desc',
        'template_group',
        'template_subject',
        'template_body',
    ];

}
