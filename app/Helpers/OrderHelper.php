<?php

namespace App\Helpers;
use App\Models\Build_status;
use App\Models\Layout_settings;
use App\Models\Product_asigned;
use App\Models\Product_plan_fitur;
use App\Models\Site;
use App\Models\User_invoices;
use App\Models\User_invoices_item;
use App\Models\User_invoices_confirm;
use App\Models\User_order_item;
use App\Models\User_orders;
use App\Models\User_payment;
use App\Models\Users;
use App\Models\Emaillogs;
use Carbon\Carbon;
use Session;

class OrderHelper
{
    public static function User_payment_active($payment_id) {

        $count = User_payment::where('payment_id',$payment_id)->count();
        return $count;

    }

    public static function Order_status_usage($user_id) {

        $quota = Product_plan_fitur::where('key','order')->where('product_id',Session::get('user_package'))->first()->value;

        $count_order = User_orders::where('seller_id',$user_id)
        ->whereMonth('created_at', Carbon::now()->month)
        ->whereYear('created_at', Carbon::now()->year)
        ->count();

        $percentage = ($count_order / $quota ) * 100;
        
        return [
            'count_order' => $count_order,
            'percentage' => round($percentage),
        ];

    }

    public static function Data_invoices($invoices_id) {

        $invoices = User_invoices::where('id',$invoices_id)->first();
        $invoices_item = User_invoices_item::where('invoices_id', $invoices_id)->get();
        
        return [
            'invoices' => $invoices,
            'invoices_item' => $invoices_item,
        ];

    }

    public static function Data_pelanggan($invoices_id) {

        $user_id = User_invoices::where('id',$invoices_id)->first()->user_id;
        $customer = Users::where('id', $user_id)->first();
        
        return [
            'customer' => $customer,
        ];

    }


    public static function transaction_exclude_fee($invoices_id) {

        $user_id = User_invoices::where('id',$invoices_id)->first()->user_id;
        $customer = Users::where('id', $user_id)->first();
        
        return [
            'customer' => $customer,
        ];

    }


    public static function Get_invoices($order_id) {

        $id = User_invoices_item::where('order_id',$order_id)->first()->invoices_id;
        
        return [
            'invoices_id' => $id,
        ];

    }

    public static function Get_invoices_status($invoices_id) {

        $status = User_invoices::where('id',$invoices_id)->first()->status_id;
        
        return [
            'status' => $status,
        ];

    }

    public static function Log_email_status($id) {

        $status = Emaillogs::where('id',$id)->where('res', 'like', '%success%')->count();
        
        return [
            'status' => $status,
        ];

    }

    public static function is_confirm($invoices_id) {

        $status = User_invoices_confirm::where('invoices_id',$invoices_id)->count();
        
        return [
            'status' => $status,
        ];

    }




}

