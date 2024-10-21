<?php

namespace App\Helpers;
use App\Models\Build_status;
use App\Models\Layout_settings;
use App\Models\Product_asigned;
use App\Models\Product_plan_fitur;
use App\Models\Site;
use App\Models\User_invoices;
use App\Models\User_order_item;
use App\Models\User_orders;
use App\Models\User_payment;
use Carbon\Carbon;
use Session;

class BillingHelper
{
    public static function saldo_pending() {

        $total_transaction = User_orders::where('seller_id', auth()->user()->id)
        ->join('user_invoices_item','user_invoices_item.order_id','=', 'user_order.id')
        ->join('user_invoices','user_invoices.id','=', 'user_invoices_item.invoices_id')
        ->join('user_invoices_transaction','user_invoices_transaction.invoices_id','=', 'user_invoices.id')
        ->where('user_invoices.status_id','1004')
        ->where('user_invoices_transaction.channel','!=','TF')
        ->where('user_invoices_transaction.channel','!=','COD')
        ->where('user_invoices_transaction.created_at','<', Carbon::today()->addDays(7))
        ->sum('user_invoices_transaction.amount_in');

        return $total_transaction;

    }

    public static function saldo_active() {

        $total_transaction = User_orders::where('seller_id', auth()->user()->id)
        ->join('user_invoices_item','user_invoices_item.order_id','=', 'user_order.id')
        ->join('user_invoices','user_invoices.id','=', 'user_invoices_item.invoices_id')
        ->join('user_invoices_transaction','user_invoices_transaction.invoices_id','=', 'user_invoices.id')
        ->where('user_invoices.status_id','1004')
        ->where('user_invoices_transaction.channel','!=','TF')
        ->where('user_invoices_transaction.channel','!=','COD')
        ->where('user_invoices_transaction.created_at','>=', Carbon::today()->addDays(7))
        ->sum('user_invoices_transaction.amount_in');

        return $total_transaction;

    }

}

