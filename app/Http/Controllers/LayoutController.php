<?php

namespace App\Http\Controllers;
use App\Models\Layout_asigned;
use App\Models\Product_asigned;
use App\Models\Product_photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use App\Http\Controllers\Controller;
use App\Models\Product_plan;
use App\Models\Product_group;
use App\Models\Product_price;

class LayoutController extends Controller
{
      /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    
    public static function layout_asign_count($layout_id,$site_id) {

        $totals = Layout_asigned::where('layout_id',$layout_id)->where('site_id',$site_id)->count();
        return $totals;
    }


}
