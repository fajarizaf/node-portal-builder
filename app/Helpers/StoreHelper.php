<?php

namespace App\Helpers;
use App\Models\Build_status;
use App\Models\Layout_settings;
use App\Models\Product_asigned;
use App\Models\Site;
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

}

