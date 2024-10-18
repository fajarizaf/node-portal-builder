<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Helpers\DuitkuHelper;
use App\Models\Layout_settings;
use App\Models\Product_asigned;
use App\Models\Product_photo;
use App\Models\Site_banks;
use App\Models\Site_payment_method;
use App\Models\User_bank;
use App\Models\User_invoices;
use App\Models\User_invoices_confirm;
use App\Models\User_invoices_item;
use App\Models\User_invoices_payment;
use App\Models\User_invoices_transaction;
use App\Models\User_package;
use App\Models\User_payment;


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
use Royryando\Duitku\Facades\Duitku;
use SiteHelper;

use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OrderController extends Controller
{

    public function duitku_create_invoices(Request $request) {

        $test = Duitku::createInvoice('ORDER-0111', 100000, 'VA', 'Product Name', 'John Doe', 'john@example.com', 120);
        dd($test);

    }

    public function duitku_payment_method(Request $request) {

        $test = Duitku::paymentMethods(100000);
        dd($test);
    }

    public function list(Request $request) {

        $site = SiteHelper::My_Site();
        $active_site_first = SiteHelper::Site_active_first();
        
        if(!empty($request->site)) {
            $site_active = $request->site;
        } else {
            if($active_site_first) {
                $site_active = $active_site_first->id;
            } else {
                $site_active = 0;
            }
        }

        $order = User_orders::latest();
        $order->where('user_order.seller_id', auth()->user()->id);
        $order->join('user_order_item', 'user_order_item.order_id', '=', 'user_order.id');
        $order->join('product_plan', 'product_plan.id', '=', 'user_order_item.product_id');
        $order->join('product_asigned', 'product_asigned.product_id', '=', 'product_plan.id');
        $order->join('user_invoices_item', 'user_invoices_item.order_id', '=', 'user_order.id');
        $order->join('user_invoices', 'user_invoices.id', '=', 'user_invoices_item.invoices_id');
        $order->join('site_status', 'site_status.status_code', '=', 'user_invoices.status_id');
        
        $order->where('user_invoices.status_id', '1005');
        $order->orderBy('user_invoices.invoices_date', 'desc');
        $order->where('product_asigned.site_id', $site_active);
        $order->select('user_order.id',
            'user_order.created_at',
            'user_order_item.product_group_name',
            'user_order_item.product_plan_name',
            'site_status.status_name',
            'product_plan.id as product_id',
            'product_plan.product_type',
            'user_order.total',
            'user_invoices_item.invoices_id'
        );

        return view('pages/manage/order',[
                'order' => $order->paginate(10)->withQueryString(),
                'sites' => $site,
                'site_active' => $site_active
        ]);

    }


    public function add_buktitransfer(Request $request) {

        try {
        
            $this->validate($request, [
                'pemilik_rekening' => 'required',
                'nomor_rekening' => 'required',
                'bukti_transfer' => 'required',
            ]);

            $uploadlocal = $request->file('bukti_transfer');
            $source_name = $uploadlocal->hashName();
            $uploadlocal->storeAs('public/uploads/payment', $source_name);

            User_invoices_confirm::create([
                'invoices_id' => $request->invoices_id,
                "pemilik_rekening" => $request->pemilik_rekening,
                'nomor_rekening' => $request->nomor_rekening,
                'bukti_transfer' => $source_name,
            ]);

            return redirect('/order/payment/'.Crypt::encrypt($request->invoices_id))->with('success', 'Terima kasih, bukti pembayaran kamu akan kami proses secepatnya.');

        } catch (\Throwable $th) {
            dd($th);
            return redirect('/order/payment/'.Crypt::encrypt($request->invoices_id))->with('failed', 'Terjadi kegagalan pada saat upload bukti pembayaran');
        }

    }


    public function list_paid(Request $request) {

        $site = SiteHelper::My_Site();
        $active_site_first = SiteHelper::Site_active_first();
        
        if(!empty($request->site)) {
            $site_active = $request->site;
        } else {
            if($active_site_first) {
                $site_active = $active_site_first->id;
            } else {
                $site_active = 0;
            }
        }

        $order = User_orders::latest();
        $order->where('user_order.seller_id', auth()->user()->id);
        $order->join('user_order_item', 'user_order_item.order_id', '=', 'user_order.id');
        $order->join('product_plan', 'product_plan.id', '=', 'user_order_item.product_id');
        $order->join('product_asigned', 'product_asigned.product_id', '=', 'product_plan.id');
        $order->join('user_invoices_item', 'user_invoices_item.order_id', '=', 'user_order.id');
        $order->join('user_invoices', 'user_invoices.id', '=', 'user_invoices_item.invoices_id');
        $order->join('site_status', 'site_status.status_code', '=', 'user_invoices.status_id');
        
        $order->where('user_invoices.status_id', '1004');
        $order->orderBy('user_invoices.invoices_date', 'desc');
        $order->where('product_asigned.site_id', $site_active);
        $order->select('user_order.id',
            'user_order.created_at',
            'user_order_item.product_group_name',
            'user_order_item.product_plan_name',
            'site_status.status_name',
            'product_plan.id as product_id',
            'product_plan.product_type',
            'user_order.total',
            'user_invoices_item.invoices_id'
        );

        return view('pages/manage/order-paid',[
                'order' => $order->paginate(10)->withQueryString(),
                'sites' => $site,
                'site_active' => $site_active
        ]);

    }


    public function list_proccess(Request $request) {

        $site = SiteHelper::My_Site();
        $active_site_first = SiteHelper::Site_active_first();
        
        if(!empty($request->site)) {
            $site_active = $request->site;
        } else {
            if($active_site_first) {
                $site_active = $active_site_first->id;
            } else {
                $site_active = 0;
            }
        }

        $order = User_orders::latest();
        $order->where('user_order.seller_id', auth()->user()->id);
        $order->join('user_order_item', 'user_order_item.order_id', '=', 'user_order.id');
        $order->join('product_plan', 'product_plan.id', '=', 'user_order_item.product_id');
        $order->join('product_asigned', 'product_asigned.product_id', '=', 'product_plan.id');
        $order->join('user_invoices_item', 'user_invoices_item.order_id', '=', 'user_order.id');
        $order->join('user_invoices', 'user_invoices.id', '=', 'user_invoices_item.invoices_id');
        $order->join('site_status', 'site_status.status_code', '=', 'user_invoices.status_id');
        
        $order->where('user_invoices.status_id', '1004');
        $order->where('user_order.status_id', '1007');
        $order->orderBy('user_invoices.invoices_date', 'desc');
        $order->where('product_asigned.site_id', $site_active);
        $order->select('user_order.id',
            'user_order.created_at',
            'user_order_item.product_group_name',
            'user_order_item.product_plan_name',
            'site_status.status_name',
            'product_plan.id as product_id',
            'product_plan.product_type',
            'user_order.total',
            'user_invoices_item.invoices_id'
        );

        return view('pages/manage/order-proccess',[
                'order' => $order->paginate(10)->withQueryString(),
                'sites' => $site,
                'site_active' => $site_active
        ]);

    }


    public function list_complete(Request $request) {

        $site = SiteHelper::My_Site();
        $active_site_first = SiteHelper::Site_active_first();
        
        if(!empty($request->site)) {
            $site_active = $request->site;
        } else {
            if($active_site_first) {
                $site_active = $active_site_first->id;
            } else {
                $site_active = 0;
            }
        }

        $order = User_orders::latest();
        $order->where('user_order.seller_id', auth()->user()->id);
        $order->join('user_order_item', 'user_order_item.order_id', '=', 'user_order.id');
        $order->join('product_plan', 'product_plan.id', '=', 'user_order_item.product_id');
        $order->join('product_asigned', 'product_asigned.product_id', '=', 'product_plan.id');
        $order->join('user_invoices_item', 'user_invoices_item.order_id', '=', 'user_order.id');
        $order->join('user_invoices', 'user_invoices.id', '=', 'user_invoices_item.invoices_id');
        $order->join('site_status', 'site_status.status_code', '=', 'user_invoices.status_id');
        
        $order->where('user_invoices.status_id', '1004');
        $order->where('user_order.status_id', '1006');
        $order->orderBy('user_invoices.invoices_date', 'desc');
        $order->where('product_asigned.site_id', $site_active);
        $order->select('user_order.id',
            'user_order.created_at',
            'user_order_item.product_group_name',
            'user_order_item.product_plan_name',
            'site_status.status_name',
            'product_plan.id as product_id',
            'product_plan.product_type',
            'user_order.total',
            'user_invoices_item.invoices_id'
        );

        return view('pages/manage/order-complete',[
                'order' => $order->paginate(10)->withQueryString(),
                'sites' => $site,
                'site_active' => $site_active
        ]);

    }


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

            $customer_exist = Users::where('email', $request->email)->count();

                if($customer_exist == 0) {
                    // insert new account buyer
                    $CREATE_BUYER = DB::table('users')->insertGetId([
                        'role_id' => 4, // buyer
                        'name' => $request->nama,
                        'email' => $request->email,
                        'password' => bcrypt($password),
                        'telp'=> $request->no_hp
                    ]);

                } else {
                    $CREATE_BUYER = Users::where('email', $request->email)->first()->id;
                }

                
                $product_item_id = $request->input('product_item_id');

                // insert new order
                $CREATE_ORDER = DB::table('user_order')->insertGetId([
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

                // insert new invoices      
                $CREATE_INVOICES = DB::table('user_invoices')->insertGetId([
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
        $payment_method = User_invoices_payment::where('user_invoices_payment.invoices_id',$invoices_id)
        ->join('site_payment_method','site_payment_method.id','=','user_invoices_payment.payment_method')
        ->get();
        
        $invoices = User_invoices::where('id', $invoices_id)->first();
        $invoices_item = User_invoices_item::where('invoices_id', $invoices->id)->get();

        $payment_options = User_payment::where('site_id',$site_id)
            ->join('site_payment_method','site_payment_method.id','=','user_payment.payment_id')
            ->where('site_payment_method.is_active', 1)
            ->select('user_payment.id','site_payment_method.id as method_id','site_payment_method.payment_method_group','site_payment_method.payment_method_name','site_payment_method.payment_method_logo')
            ->get();
        
        $user_bank = User_bank::where('user_bank.site_id', $site_id)
        ->join('site_banks','site_banks.id','=', 'user_bank.bank_id')
        ->select('user_bank.id','user_bank.account_name','user_bank.account_number','site_banks.bank_logo','user_bank.notes')
        ->get();

        // belum pilih payment method
        if($payment_method->count() == 0) {
            
            return view('pages/frond/payment_select', [
                    'invoices' => $invoices,
                    'invoices_item' => $invoices_item,
                    'payment_options' => $payment_options,
                    'site_id' => $site_id
            ]);
        
        // sudah pilih payment method
        } else {
            
            if($payment_method[0]->payment_method_group == "Manual Transfer") { 

                return view('pages/frond/payment/payment-page-banktransfer', [
                    'invoices' => $invoices,
                    'invoices_item' => $invoices_item,
                    'user_bank' => $user_bank,
                    'site_id' => $site_id
                ]);

            }

            if($payment_method[0]->payment_method_group == "Virtual Account") {

                // invoices belum paid
                if($invoices->status_id != '1004') {

                    if($payment_method[0]->payment_expired < Carbon::now()->format('Y-m-d H:i:s')) {
                        
                        $DUITKU = DuitkuHelper::Refresh($invoices_id, $payment_method[0]->payment_method, $payment_method[0]->fee);    

                    }
                    
                    return view('pages/frond/payment/payment-page-va', [
                        'invoices' => $invoices,
                        'invoices_item' => $invoices_item,
                        'user_bank' => $user_bank,
                        'user_payment' => $payment_method,
                        'site_id' => $site_id
                    ]);
                
                    // invoices telah paid
                } else {

                    $user_transaction = User_invoices_transaction::where('user_invoices_transaction.invoices_id', $invoices_id)->join('site_payment_method','site_payment_method.channel_id','=','user_invoices_transaction.channel')->first();
                    
                    return view('pages/frond/payment/payment-success', [
                        'invoices' => $invoices,
                        'invoices_item' => $invoices_item,
                        'user_transaction' => $user_transaction,
                        'site_id' => $site_id
                    ]);

                }


            }

        } 

    }


    public function payment_proccess(Request $request) {

        $invoices_id = $request->invoices_id;

        $payment_fee_settings = Layout_settings::where('site_id', $request->site)->where('key','payment_fee')->first()->value;

        // bebankan biaya transaksi ke pelanggan
        if($payment_fee_settings == 1) {
            $calc = User_invoices::where('id',$request->invoices_id)->update([
                'total' => $request->total,
            ]);
        }

        $payment_method = User_invoices_payment::where('invoices_id',$invoices_id)->count();

        if($payment_method == 0) {
            
            $site_payment = Site_payment_method::where('id', $request->payment_method)->first();

            if($site_payment->payment_method_group == "Manual Transfer" || $site_payment->payment_method_group == "Bayar Ditempat") { 

                $CREATE_PAYMENT = User_invoices_payment::create([
                    'invoices_id' => $invoices_id,
                    'payment_method' => $request->payment_method
                ]);

            }

            if($site_payment->payment_method_group == "Virtual Account") { 

                $PG = DuitkuHelper::Create($invoices_id, $request->payment_method, $request->fee);

                if($PG['response']['success'] = false) {

                    return redirect('/order/payment'.'/'.Crypt::encrypt($invoices_id))->with('failed', 'Sementara pilih metode pembayaran yang lain');

                }

            }
            
        } else {

            $DUITKU = DuitkuHelper::Refresh($invoices_id, $request->payment_method, $request->fee);  

        } 

        return redirect('/order/payment'.'/'.Crypt::encrypt($invoices_id));

    }


    public function get_payment_fee(Request $request)
    {

        try {

            $payment_fee_settings = Layout_settings::where('site_id', $request->site)->where('key','payment_fee')->first()->value;

            if($payment_fee_settings == 1) {
                $method = Site_payment_method::where('id',$request->method_id)->first()->fee;
            } else {
                $method = 0;
            }

            return response()->json(["status" => "success", 'fee' => $method]);

        } catch (\Throwable $th) {

            return response()->json(["status" => "failed", 'fee' => $method]);

        }
    }


    public function order_switch_product(Request $request)
    {
        $product_id = $request->product_plan;

        $product_link = Product_plan::where('id', $product_id)->first()->product_plan_link;

        return redirect('/order'.'/'.$product_link);
    }

}
