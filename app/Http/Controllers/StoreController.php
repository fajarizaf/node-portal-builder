<?php

namespace App\Http\Controllers;

use App\Models\Layout_settings;
use App\Models\Product_photo;
use App\Models\Site_banks;
use App\Models\Site_payment_method;
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
use StoreHelper;

use Illuminate\Support\Facades\Http;
use Spatie\Browsershot\Browsershot;

class StoreController extends Controller
{

    public function index(Request $request) {

        $product = Product_plan::latest();
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

        $product->where('product_plan.user_id', auth()->user()->id);
        $product->join('product_group', 'product_group.id', '=', 'product_plan.product_group_id');
        $product->join('product_asigned', 'product_asigned.product_id', '=', 'product_plan.id');
        $product->where('product_asigned.site_id', $site_active);
        $product->select('product_plan.id','product_plan.product_stock','product_plan.product_plan_name','product_plan.product_plan_link','product_group.product_group_name','product_plan.created_at');

        $product_group = Product_group::where('user_id',auth()->user()->id)->get();

        return view('pages/manage/store/personalisasi',[
            'product' => $product->paginate(5)->withQueryString(),
            'product_group' => $product_group,
            'sites' => $site,
            'site_active' => $site_active
        ]);


    }

    public function settings(Request $request) {

        $site = SiteHelper::My_Site();
        $active_site_first = SiteHelper::Site_active_first();

        if(!empty($request->site)) {
            $site_active = base64_decode($request->site);
        } else {
            if($active_site_first) {
                $site_active = $active_site_first->id;
            } else {
                $site_active = 0;
            }
        }

        $settings_logo = Layout_settings::where('site_id', $site_active)->where('key','logo')->first();
        $settings_color = Layout_settings::where('site_id', $site_active)->where('key','color')->first();
        $settings_display = Layout_settings::where('site_id', $site_active)->where('key','display')->first();

        return view('pages/manage/store/personalisasi-settings',[
            'sites' => $site,
            'site_active' => $site_active,
            'settings_logo' => $settings_logo,
            'settings_color' => $settings_color,
            'settings_display' => $settings_display
        ]);

    }

    public function order(Request $request) {

        $site = SiteHelper::My_Site();
        $active_site_first = SiteHelper::Site_active_first();

        if(!empty($request->site)) {
            $site_active = base64_decode($request->site);
        } else {
            if($active_site_first) {
                $site_active = $active_site_first->id;
            } else {
                $site_active = 0;
            }
        }

        return view('pages/manage/store/personalisasi-order',[
            'sites' => $site,
            'site_active' => $site_active
        ]);

    }


    public function payment(Request $request) {

        $site = SiteHelper::My_Site();
        $active_site_first = SiteHelper::Site_active_first();

        if(!empty($request->site)) {
            $site_active = base64_decode($request->site);
        } else {
            if($active_site_first) {
                $site_active = $active_site_first->id;
            } else {
                $site_active = 0;
            }
        }

        if($request->payment) {
            
            $payments = $request->payment;

            $exist_payment = User_payment::where('site_id', $request->site)->count();
            
            if($exist_payment != 0) {
                User_payment::where('site_id', $request->site)->delete();
            }
            
            foreach($payments as $pay){
                User_payment::create([
                    'payment_id' => $pay,
                    "site_id" => $request->site,
                ]);
            }

            return redirect('/store/payment/'.urlencode(base64_encode($request->site)))->with('success', 'Perubahan berhasil dilakukan');

        }

        if($request->account_bank) {
            
            User_bank::create([
                'bank_id' => $request->account_bank,
                "site_id" => $site_active,
                'account_name' => $request->account_name,
                'account_number' => $request->account_number,
                'notes' => $request->notes
            ]);

            return redirect('/store/payment/'.urlencode(base64_encode($request->site_id)))->with('success', 'Tambah bank account berhasil dilakukan');

        }

        $settings_payment_fee = Layout_settings::where('site_id', $site_active)->where('key','payment_fee')->first();

        $payment_method = Site_payment_method::where('is_active',1)->get();
        $user_payment = User_payment::where('site_id', $site_active)->get();
        $site_bank = Site_banks::get();
        $user_bank = User_bank::where('user_bank.site_id', $site_active)
        ->join('site_banks','site_banks.id','=', 'user_bank.bank_id')
        ->select('user_bank.id','user_bank.account_name','user_bank.account_number','site_banks.bank_logo')
        ->get();

        return view('pages/manage/store/personalisasi-pembayaran',[
            'sites' => $site,
            'site_active' => $site_active,
            'payment_method' => $payment_method,
            'settings_payment_fee' => $settings_payment_fee,
            'user_payment' => $user_payment,
            'site_bank' => $site_bank,
            'user_bank' => $user_bank
        ]);

    }


    public function persona_logo(Request $request)
    {

        try {

            $folderPath = storage_path('app/public/uploads/avatar/');
            $image_parts = explode(";base64,", $request->image);
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);

            $imageName = uniqid() . '.png';
            $imageFullPath = $folderPath.$imageName;
            file_put_contents($imageFullPath, $image_base64);

            $if_exist = Layout_settings::where('site_id',$request->site)->where('key','logo')->count();

            if($if_exist == 0) {
                Layout_settings::create([
                    'site_id' => $request->site,
                    "key" => 'logo',
                    'value' => $imageName,
                ]);
            } else {
                Layout_settings::where('site_id',$request->site)->where('key','logo')->update([
                    'value' => $imageName,
                ]);
            }
            
            return response()->json(["status" => "success", 'response' => 'upload_success']);

        } catch (\Throwable $th) {

            return response()->json(["status" => "failed", 'response' => $th->getMessage()]);

        }
    }


    public function persona_color(Request $request)
    {

        try {

            $if_exist = Layout_settings::where('site_id',$request->site)->where('key','color')->count();

            if($if_exist == 0) {
                Layout_settings::create([
                    'site_id' => $request->site,
                    "key" => 'color',
                    'value' => $request->color,
                ]);
            } else {
                Layout_settings::where('site_id',$request->site)->where('key','color')->update([
                    'value' => $request->color,
                ]);
            }
            
            
            return response()->json(["status" => "success", 'response' => 'updated']);

        } catch (\Throwable $th) {

            return response()->json(["status" => "failed", 'response' => $th->getMessage()]);

        }
    }


    public function persona_display(Request $request)
    {

        try {

            $if_exist = Layout_settings::where('site_id',$request->site)->where('key','display')->count();

            if($if_exist == 0) {
                Layout_settings::create([
                    'site_id' => $request->site,
                    "key" => 'display',
                    'value' => $request->display,
                ]);
            } else {
                Layout_settings::where('site_id',$request->site)->where('key','display')->update([
                    'value' => $request->display,
                ]);
            }
            
            
            return response()->json(["status" => "success", 'response' => 'updated']);

        } catch (\Throwable $th) {

            return response()->json(["status" => "failed", 'response' => $th->getMessage()]);

        }
    }

    public function persona_payment_fee(Request $request)
    {

        try {

            $if_exist = Layout_settings::where('site_id',$request->site)->where('key','payment_fee')->count();

            if($if_exist == 0) {
                Layout_settings::create([
                    'site_id' => $request->site,
                    "key" => 'payment_fee',
                    'value' => $request->payment_fee,
                ]);
            } else {
                Layout_settings::where('site_id',$request->site)->where('key','payment_fee')->update([
                    'value' => $request->payment_fee,
                ]);
            }
            
            return response()->json(["status" => "success", 'response' => 'updated']);

        } catch (\Throwable $th) {

            return response()->json(["status" => "failed", 'response' => $th->getMessage()]);

        }
    }


    public function run_store_mobile_snapshoot(Request $request)
    { 
        
        try {
            
            Browsershot::url($request->domain_name)
                ->setOption('landscape', false)
                ->windowSize(300, 616)
                ->waitUntilNetworkIdle()
                ->save(storage_path() . '/uploads/order.png');

            return url('/storage/uploads/order.png');

        } catch (\Throwable $th) {
            
            return url('/storage/uploads/screenshot.png');
            
        }

    }

    public function run_store_laptop_snapshoot(Request $request)
    { 
        
        try {
            
            Browsershot::url($request->domain_name)
                ->setOption('landscape', false)
                ->windowSize(1200, 780)
                ->waitUntilNetworkIdle()
                ->save(storage_path() . '/uploads/order.png');

            return url('/storage/uploads/order.png');

        } catch (\Throwable $th) {
            
            return url('/storage/uploads/screenshot.png');
        }

    }

}
