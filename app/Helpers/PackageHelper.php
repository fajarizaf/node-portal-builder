<?php

namespace App\Helpers;
use App\Models\User_package;

class PackageHelper
{
    public static function Get_info($user_id) {

        $package = User_package::where('user_package.user_id',$user_id)
        ->join('product_plan','product_plan.id','=','user_package.product_plan_id' )
        ->join('site_status','site_status.status_code','=','user_package.status_id' )
        ->first();
        return $package;

    }

}