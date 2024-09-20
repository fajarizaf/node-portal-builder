<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'users_roles';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'role_name',
        'role_type',
        'status_id',
    ];

}
