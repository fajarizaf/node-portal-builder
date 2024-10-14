<?php

namespace App\Helpers;
use App\Models\Build_status;
use App\Models\Product_asigned;
use App\Models\Product_plan_fitur;
use App\Models\Site;
use App\Models\User_invoices_item;
use App\Models\User_order_item;
use Session;

class SiteHelper
{
    public static function Product_asign_count($site_id) {

        $total = Product_asigned::where('site_id',$site_id)->count();
        return $total;

    }

    public static function Last_status_build($domain_name) {

        $status = Build_status::where('domain_name',$domain_name)->orderBy('created_at','desc')->first();
        return $status;

    }

    public static function Site_active_first() {

        $site_id = Site::where('user_id',auth()->user()->id)->orderBy('created_at','asc')->first();
        return $site_id;

    }

    public static function My_Site() {

        $site = Site::where('user_id', auth()->user()->id)->get();

        return $site;

    }

    public static function Site_Latest() {

        $site = Site::where('user_id', auth()->user()->id)->order('desc')->limit(1)->get();

        return $site;

    }

    public static function Get_siteid_byinvoices($invoicesid) {

        $order = User_invoices_item::where('invoices_id', $invoicesid)->first()->order_id;
        $product = User_order_item::where('order_id',$order)->first()->product_id;
        $site = Product_asigned::where('product_id',$product)->first()->site_id;

        return $site;

    }

    public static function Site_status_usage($user_id) {

        $quota = Product_plan_fitur::where('key','site')->where('product_id',Session::get('user_package'))->first()->value;

        $count_site = Site::where('user_id',$user_id)->count();

        $percentage = ($count_site / $quota ) * 100;
        
        return [
            'count_site' => $count_site,
            'percentage' => round($percentage),
        ];

    }

}