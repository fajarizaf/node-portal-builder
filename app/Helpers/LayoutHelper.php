<?php

namespace App\Helpers;
use App\Models\Layout_asigned;

class LayoutHelper
{
    public static function Layout_asign_name($site_id) {

        $name = Layout_asigned::where('layout_asigned.site_id',$site_id)
        ->join('site_layout','site_layout.id','=','layout_asigned.layout_id')
        ->select('site_layout.layout_name')
        ->first()->layout_name;

        return $name;

    }
}