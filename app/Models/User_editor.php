<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_editor extends Model
{
    protected $table = 'user_editor';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'site_id',
        'username_editor',
        "password_editor"
    ];

}
