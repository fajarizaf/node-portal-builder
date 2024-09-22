<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Product_plan;
use App\Models\Product_group;
use App\Models\Product_price;

class OrderController extends Controller
{

    public function checkout(Request $request, $product_id)
    {

        $product_id = base64_decode($product_id);

        if($request->billing_cycle) {
            $billing_cycle = $request->billing_cycle;
        } else {
            $billing_cycle = 'Monthly';
        }

        $product_selected = Product_plan::where('product_plan.id', $product_id)
                    ->join('product_group', 'product_group.id', '=', 'product_plan.product_group_id')
                    ->join('product_price', 'product_price.product_id', '=', 'product_plan.id')
                    ->where('product_price.billing_cycle', $billing_cycle)
                    ->select('product_plan.id','product_plan.user_id','product_plan.product_plan_name','product_price.price','product_group.product_group_name')
                    ->first();

        $product_owner = Product_plan::where('product_plan.user_id', $product_selected->user_id)
                    ->join('product_group', 'product_group.id', '=', 'product_plan.product_group_id')
                    ->select('product_plan.id','product_plan.product_plan_name','product_group.product_group_name')
                    ->get();

        $product_cycle = Product_price::where('product_id', $product_id)->get();

        return view('pages/frond/checkout', [
                'product_selected' => $product_selected,
                'product_owner' => $product_owner,
                'product_cycle' => $product_cycle,
        ]);
    }


    public function switch(Request $request)
    {
        $product_id = $request->product_plan;

        $product_link = Product_plan::where('id', $product_id)->first()->product_plan_link;

        return redirect('/checkout'.'/'.$product_link);
    }

}
