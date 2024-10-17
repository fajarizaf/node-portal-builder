<?php

namespace App\Helpers;
use App\Models\User_invoices;

class CustomerHelper
{
    public static function customer_info_byinvoices($invoices_id) {

        $customer = User_invoices::where('user_invoices.id', $invoices_id)
        ->join('users','users.id','=', 'user_invoices.user_id')
        ->first();

        return $customer;

    }

}

