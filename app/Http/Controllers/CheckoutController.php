<?php

namespace App\Http\Controllers;

use App\Models\User_invoices;
use App\Models\User_invoices_item;
use App\Models\User_package;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use App\Models\Product_plan;
use App\Models\Product_group;
use App\Models\Product_price;
use App\Models\Customers;
use App\Models\User_orders;
use App\Models\User_order_item;
use App\Models\Build_status;
use App\Models\User_subscriptions;
use App\Models\Site;
use App\Models\Users;
use Session;

class CheckoutController extends Controller
{

    public function checkout(Request $request, $product_id)
    {

        if(Session::get('user_package') == '') { 

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

            if($product_selected->price == 0) {
                $order_type = 'free';
                $is_trial = 0;
            } else {
                if($request->is_trial == 1) {
                    $is_trial = 1;
                } else {
                    $is_trial = 0;
                }
                $order_type = 'paid';
            }

            return view('pages/frond/checkout-trial', [
                'product_selected' => $product_selected,
                'billing_cycle_selected' => $billing_cycle,
                'product_owner' => $product_owner,
                'product_cycle' => $product_cycle,
                'order_type' => $order_type,
                'is_trial' => $is_trial
            ]);

        } else {
            return redirect('/manage');
        }
        
    }


    public function checkout_proccess(Request $request)
    {

        try {

            DB::beginTransaction();
            
           
            if($request->order_type == 'paid') {
                $status_id = '1003';
                $is_free = 0;
            }

            if($request->order_type == 'free') {
                $status_id = '1006';
                $is_free = 1;
            }

            $subdomain = $request->subdomain.'.nodebuilder.id';

            $CREATE_ORDER = DB::table('user_order')->insertGetId([
                'user_id' => auth()->user()->id,
                'seller_id' => $request->product_owner,
                'sub_total' => $request->total_tagihan,
                'tax_rate' => $request->total_tax_rate,
                'tax' => $request->total_tax,
                'total' => $request->total_tagihan,
                'domain_tipe' => 'subdomain',
                'domain' => $subdomain,
                'status_id' => $status_id,
            ]);

            // set pelanggan ambil paket yang mana
            $SET_CUSTOMER_PACKAGE = DB::table('user_package')->insertGetId([
                'user_id' => auth()->user()->id,
                'reseller_id' => $request->product_owner,
                'order_id' => $CREATE_ORDER,
                'product_plan_id' => $request->product_id,
                'billing_cycle' => $request->billing_cycle,
                'amount' => $request->total_tagihan,
                'is_free' => $is_free,
                'status_id' => '1001'
            ]);

            // create auto login
            Session::put('user_package', $SET_CUSTOMER_PACKAGE);

            $product_item_name = $request->product_item_name;

            if(count($product_item_name) != 0) {

                $product_item_group = $request->input('product_item_group');
                $product_item_price = $request->input('product_item_price');
                $product_item_qty = $request->input('product_item_qty');

                for ($item = 0; $item < count($product_item_name); $item++) {

                    $CREATE_ORDER_ITEM = DB::table('user_order_item')->insertGetId([
                        'order_id' => $CREATE_ORDER,
                        'product_id' => $request->product_id,
                        'product_group_name' => $product_item_group[$item],
                        'product_plan_name' => $product_item_name[$item],
                        'promo' => $request->order_promo,
                        'billing_cycle' => $request->billing_cycle,
                        'unit_price' => $product_item_price[$item],
                        'qty' => $product_item_qty[$item],
                    ]);

                }

            }

            if($request->order_type == 'paid' || $request->is_trial == 1) {
                
                $CREATE_INVOICES = DB::table('user_invoices')->insertGetId([
                    'user_id' => auth()->user()->id,
                    'invoices_type' => 'register',
                    'invoices_date' => Carbon::now(),
                    'invoices_duedate' => Carbon::now()->addDays(7),
                    'tax' => 0,
                    'sub_total' => $request->total_tagihan,
                    'total' => $request->total_tagihan,
                    'is_publish' => true,
                    'status_id' => '1005'
                ]);

                $CREATE_INVOICES_ITEM = DB::table('user_invoices_item')->insertGetId([
                    'invoices_id' => $CREATE_INVOICES,
                    'order_id' => $CREATE_ORDER,
                    'user_id' => auth()->user()->id,
                    'item_name' => $product_item_name[0].' - Website Builder',
                    'qty' => 1,
                    'amount' => $request->total_tagihan
                ]);

            }

            DB::commit();

            return redirect('/site/build/'.urlencode(base64_encode($subdomain)));

        } catch (\Throwable $th) {
            
            DB::rollBack();
            dd($th);

        }


    }



    public function checkout_switch_product(Request $request)
    {
        $product_id = $request->product_plan;

        $product_link = Product_plan::where('id', $product_id)->first()->product_plan_link;

        return redirect('/checkout'.'/'.$product_link);
    }

}
