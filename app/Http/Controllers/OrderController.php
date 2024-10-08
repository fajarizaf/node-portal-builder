<?php

namespace App\Http\Controllers;

use App\Models\Product_asigned;
use App\Models\Product_photo;
use App\Models\Site_banks;
use App\Models\User_bank;
use App\Models\User_invoices;
use App\Models\User_invoices_item;
use App\Models\User_invoices_payment;
use App\Models\User_package;
use App\Models\User_payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
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
use ProdukHelper;
use SiteHelper;

class OrderController extends Controller
{

    public function order(Request $request, $product_id) {

        $product_id = base64_decode($product_id);

        $site_id = ProdukHelper::get_siteid_byproduk($product_id);

        if($request->billing_cycle) {
            $billing_cycle = $request->billing_cycle;
        } else {
            $billing_cycle = 'Monthly';
        }

        $product_selected = Product_plan::where('product_plan.id', $product_id)
                    ->join('product_group', 'product_group.id', '=', 'product_plan.product_group_id')
                    ->join('product_price', 'product_price.product_id', '=', 'product_plan.id')
                    ->where('product_price.billing_cycle', $billing_cycle)
                    ->select(
               'product_plan.id',
                        'product_plan.user_id',
                        'product_plan.product_plan_name',
                        'product_plan.product_plan_desc',
                        'product_price.price',
                        'product_group.product_group_name'
                        )
                    ->first();

        $product_owner = Product_plan::where('product_plan.user_id', $product_selected->user_id)
                    ->join('product_group', 'product_group.id', '=', 'product_plan.product_group_id')
                    ->join('product_asigned','product_asigned.product_id','=','product_plan.id')
                    ->where('product_asigned.site_id', $site_id)
                    ->select('product_plan.id','product_plan.product_plan_name','product_group.product_group_name')
                    ->get();

        $product_cycle = Product_price::where('product_id', $product_id)->get();
        $product_photo = Product_photo::where('product_id', $product_id)->get();
        $product_excerpt = Str::limit($product_selected->product_plan_desc, 100);

        $site_id = Product_asigned::where('product_id',$product_selected->id)->first()->site_id;

        return view('pages/frond/checkout/01-single-product', [
                'product_selected' => $product_selected,
                'billing_cycle_selected' => 'Monthly',
                'product_owner' => $product_owner,
                'product_cycle' => $product_cycle,
                'product_photo' => $product_photo,
                'product_excerpt' => $product_excerpt,
                'site_id' => $site_id 
        ]);
        
    }


    public function order_proccess(Request $request) {

        try {
            
            DB::beginTransaction();

            $password = Str::random(6);

            // insert new account buyer
            $CREATE_BUYER = DB::table('users')->insertGetId([
                'role_id' => 4, // buyer
                'name' => $request->nama,
                'email' => $request->email,
                'password' => bcrypt($password),
                'telp'=> $request->no_hp
            ]);

            $ORDER_NUMBER = IdGenerator::generate(['table' => 'user_order', 'field' => 'order_number', 'length' => 15, 'prefix' => 'ORDER-']);
            $product_item_id = $request->input('product_item_id');

            // insert new order
            $CREATE_ORDER = DB::table('user_order')->insertGetId([
                'order_number' => $ORDER_NUMBER,
                'user_id' => $CREATE_BUYER,
                'seller_id' => ProdukHelper::get_product_owner($product_item_id[0]),
                'sub_total' => $request->total_tagihan,
                'tax_rate' => $request->total_tax_rate,
                'tax' => $request->total_tax,
                'total' => $request->total_tagihan,
                'status_id' => '1003', // pending
            ]);

            $product_item_name = $request->product_item_name;


            $product_item_group = $request->input('product_item_group');
            $product_item_price = $request->input('product_item_price');
            $product_item_qty = $request->input('product_item_qty');

            $sub_total = 0;
            $total = 0;

            // insert new order item
            for ($item = 0; $item < count($product_item_name); $item++) {

                $CREATE_ORDER_ITEM = DB::table('user_order_item')->insert([
                    'order_id' => $CREATE_ORDER,
                    'product_id' => $product_item_id[$item],
                    'product_group_name' => $product_item_group[$item],
                    'product_plan_name' => $product_item_name[$item],
                    'unit_price' => $product_item_price[$item],
                    'qty' => $product_item_qty[$item],
                    'promo' => $request->order_promo,
                    'billing_cycle' => $request->billing_cycle,
                ]);

                $sub_total_item = $product_item_price[$item] * $product_item_qty[$item];
                $sub_total = $sub_total + $sub_total_item;
                $total = $total + $sub_total_item;
                        
            }


            $INVOICES_NUMBER = IdGenerator::generate(['table' => 'user_invoices', 'field' => 'invoices_number', 'length' => 15, 'prefix' => 'INV-']);
            
            // insert new invoices      
            $CREATE_INVOICES = DB::table('user_invoices')->insertGetId([
                'invoices_number' => $INVOICES_NUMBER,
                'user_id' => $CREATE_BUYER,
                'invoices_type' => 'register',
                'invoices_date' => Carbon::now(),
                'invoices_duedate' => Carbon::now()->addDays(7),
                'tax' => $request->total_tax_rate,
                'sub_total' => $sub_total,
                'total' => $total,
                'is_publish' => 1,
                'status_id' => '1005', // unpaid
            ]);

            // insert new invoices item
            for ($item = 0; $item < count($product_item_name); $item++) {

                $CREATE_INVOICES_ITEM = DB::table('user_invoices_item')->insert([
                    'invoices_id' => $CREATE_INVOICES,
                    'order_id' => $CREATE_ORDER,
                    'user_id' => $CREATE_BUYER,
                    'item_name' => $product_item_name[$item],
                    'amount' => $product_item_price[$item],
                    'qty' => $product_item_qty[$item],
                ]);

            }

            DB::commit();

            return redirect('/order/payment'.'/'.Crypt::encrypt($CREATE_INVOICES));

        } catch (\Throwable $th) {
            
            DB::rollBack();

        }


    }

    public function payment_select(Request $request) {

        $invoices_id = Crypt::decrypt($request->invoices_id);
        
        $site_id = SiteHelper::Get_siteid_byinvoices($invoices_id);
        $payment_method = User_invoices_payment::where('invoices_id',$invoices_id)->count();
        $invoices = User_invoices::where('id', $invoices_id)->first();
        $invoices_item = User_invoices_item::where('invoices_id', $invoices->id)->get();

        $payment_options = User_payment::where('site_id',$site_id)
            ->join('site_payment_method','site_payment_method.id','=','User_payment.payment_id')
            ->select('user_payment.id','site_payment_method.payment_method_name','site_payment_method.payment_method_logo')
            ->get();
        
        $user_bank = User_bank::where('user_bank.site_id', $site_id)
        ->join('site_banks','site_banks.id','=', 'user_bank.bank_id')
        ->select('user_bank.id','user_bank.account_name','user_bank.account_number','site_banks.bank_logo','user_bank.notes')
        ->get();

        if($payment_method == 0) {

            return view('pages/frond/payment_select', [
                    'invoices' => $invoices,
                    'invoices_item' => $invoices_item,
                    'payment_options' => $payment_options,
                    'site_id' => $site_id
            ]);

        } else {

            return view('pages/frond/payment_info', [
                    'invoices' => $invoices,
                    'invoices_item' => $invoices_item,
                    'user_bank' => $user_bank,
                    'site_id' => $site_id
            ]);

        } 

    }


    public function payment_proccess(Request $request) {

        $invoices_id = $request->invoices_id;

        $payment_method = User_invoices_payment::where('invoices_id',$invoices_id)->count();

        if($payment_method == 0) {

            $CREATE_PAYMENT = User_invoices_payment::create([
                'invoices_id' => $invoices_id,
                'payment_method' => $request->payment_method
            ]);
            

        } else {

            $post = User_invoices_payment::where('invoices_id',$invoices_id)->update([
                'payment_method' => $request->payment_method,
            ]);

        } 

        return redirect('/order/payment'.'/'.Crypt::encrypt($invoices_id));

    }


    public function order_switch_product(Request $request)
    {
        $product_id = $request->product_plan;

        $product_link = Product_plan::where('id', $product_id)->first()->product_plan_link;

        return redirect('/order'.'/'.$product_link);
    }

}
