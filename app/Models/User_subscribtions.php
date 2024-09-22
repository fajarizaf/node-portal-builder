<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_subscriptions extends Model
{
    protected $table = 'user_subscription';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'reseller_id',
        'order_id',
        'product_plan_id',
        'site_id',
        'billing_cycle',
        'amount',
        'is_free',
        'next_due_date',
        'active_date',
        'suspend_date',
        'reactive_date',
        'terminate_date',
        'status_id',
    ];

}
