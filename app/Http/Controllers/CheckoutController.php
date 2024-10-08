<?php

namespace App\Http\Controllers;

use App\Models\User_package;
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

class CheckoutController extends Controller
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

        return view('pages/frond/checkout-trial', [
                'product_selected' => $product_selected,
                'billing_cycle_selected' => 'Monthly',
                'product_owner' => $product_owner,
                'product_cycle' => $product_cycle,
        ]);
        
    }


    public function checkout_proccess(Request $request)
    {

        $password = Str::random(6);

        $CREATE_SELLER = Users::create([
           'role_id' => 3, //seller
           'name' => $request->nama,
           'email' => $request->email,
           'password' => bcrypt($password),
           'telp'=> $request->no_hp
        ]);

        if(!empty($CREATE_SELLER->id)) {

            $ORDER_NUMBER = IdGenerator::generate(['table' => 'user_order', 'field' => 'order_number', 'length' => 15, 'prefix' => 'ORDER-']);

            if($request->order_type == 'trial') {
                $status_id = '1006';
            } else {
                $status_id = '1003';
            }

            $subdomain = $request->subdomain.'.nodebuilder.id';

            $CREATE_ORDER = User_orders::create([
                'order_number' => $ORDER_NUMBER,
                'user_id' => $CREATE_SELLER->id,
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
            $SET_CUSTOMER_PACKAGE = User_package::create([
                'user_id' => $CREATE_SELLER->id,
                'reseller_id' => $request->product_owner,
                'order_id' => $CREATE_ORDER->id,
                'product_plan_id' => $request->product_id,
                'billing_cycle' => $request->billing_cycle,
                'amount' => $request->total_tagihan,
                'is_free' => 1,
                'status_id' => '1003'
            ]);

            // create auto login
            $request->session()->regenerate();
            $request->session()->put('user_id', $CREATE_SELLER->id);
            $request->session()->put('role_id', 3);
            $request->session()->put('package_id', $SET_CUSTOMER_PACKAGE->id);

            $product_item_name = $request->product_item_name;

            if(count($product_item_name) != 0) {

                $product_item_group = $request->input('product_item_group');
                $product_item_price = $request->input('product_item_price');
                $product_item_qty = $request->input('product_item_qty');

                for ($item = 0; $item < count($product_item_name); $item++) {

                    $CREATE_ORDER_ITEM = User_order_item::create([
                        'order_id' => $CREATE_ORDER->id,
                        'product_id' => $request->product_id,
                        'product_group_name' => $product_item_group[$item],
                        'product_plan_name' => $product_item_name[$item],
                        'promo' => $request->order_promo,
                        'billing_cycle' => $request->billing_cycle,
                        'unit_price' => $product_item_price[$item],
                        'qty' => $product_item_qty[$item],
                        'status_id' => '1006',
                    ]);

                }

            }

            return redirect('/site/build/'.urlencode(base64_encode($subdomain)));

        } else {

            return redirect('/site/build')->with('failed', 'Pemesanan gagal dilakukan');

        }

    }



    public function checkout_switch_product(Request $request)
    {
        $product_id = $request->product_plan;

        $product_link = Product_plan::where('id', $product_id)->first()->product_plan_link;

        return redirect('/checkout'.'/'.$product_link);
    }

}
