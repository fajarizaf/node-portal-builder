<?php

namespace App\Helpers;
use App\Models\Build_status;
use App\Models\Layout_settings;
use App\Models\Product_asigned;
use App\Models\Site;
use App\Models\User_invoices_item;
use App\Models\User_payment;

class StoreHelper
{
    public static function User_payment_active($payment_id) {

        $count = User_payment::where('payment_id',$payment_id)->count();
        return $count;

    }

    public static function Display_logo($site_id) {

        $logo = Layout_settings::where('site_id',$site_id)->where('key','logo')->first();
        return $logo;

    }

    public static function Display_color($site_id) {

        $color = Layout_settings::where('site_id',$site_id)->where('key','color')->first();
        return $color;

    }

    public static function Display_product($site_id) {

        $display = Layout_settings::where('site_id',$site_id)->where('key','display')->first();
        return $display;

    }

    public static function Url_snapshoot_detail($site_id) {

        $product_id = Product_asigned::where('site_id',$site_id)->first();

        return url('/order/'.urlencode(base64_encode($product_id->product_id)));

    }



    public static function Get_logo($invoices_id) {

        $logo = User_invoices_item::where('user_invoices_item.invoices_id',$invoices_id)
        ->join('user_order','user_order.id','=','user_invoices_item.order_id')
        ->join('user_order_item','user_order_item.order_id','=','user_order.id')
        ->join('product_asigned','product_asigned.product_id','=','user_order_item.product_id')
        ->join('layout_settings','layout_settings.site_id','=','product_asigned.site_id')
        ->where('layout_settings.key','logo')->first()->value;
        return $logo;

    }

}

