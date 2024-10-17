<?php

namespace App\Http\Controllers;

use App\Helpers\ProdukHelper;
use App\Models\Layout_settings;
use App\Models\Product_photo;
use App\Models\User_bank;
use App\Models\User_package;
use App\Models\User_payment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use App\Models\Product_plan;
use App\Models\Product_group;
use App\Models\Product_price;
use App\Models\Customers;
use App\Models\User_orders;
use App\Models\User_order_item;
use App\Models\Build_status;
use App\Models\Site;
use App\Models\User_editor;
use App\Models\Users;
use App\Models\Product_asigned;
use App\Models\Layout_asigned;

use Illuminate\Support\Facades\Http;
use Session;
use Spatie\Browsershot\Browsershot;

class SiteController extends Controller
{

    public function index()
    {

        $site = Site::latest();

        $site->where('user_id', auth()->user()->id);
        $site->get();

        return view('pages/manage/site',[
            'sites' => $site->paginate(5)->withQueryString(),
        ]);

    }


    public function run_snapshoot(Request $request)
    { 
        
        try {
            
            Browsershot::url('https://'.$request->domain_name.'/')
                ->setOption('landscape', true)
                ->windowSize(1164, 873)
                ->waitUntilNetworkIdle()
                ->save(public_path() . '/assets/image/snapshoot/'.$request->domain_name.'.png');

            return url('/assets/image/snapshoot/'.$request->domain_name.'.png');

        } catch (\Throwable $th) {

            return url('/assets/image/screenshot.png');
        }

    }


    public function build_website($subdomain)
    {

        $domain = base64_decode($subdomain);

        // getl latest step install
        $step = Build_status::where('domain_name', $domain )
            ->orderBy('created_at', 'DESC')
            ->first();
            
        if(empty($step)) { 

            // buat layanan untuk pelanggan baru
            $CREATE_SITE = Site::create([
                'user_id' => auth()->user()->id,
                'domain_name' => $domain,
                'status_id' => '1003'
            ]);

            $site_id = $CREATE_SITE->id;

            // create dummy product
            ProdukHelper::create_dummy_product($site_id);

            // asign layout to site
            $ASIGN_LAYOUT = Layout_asigned::create([
                'layout_id' => 1,
                'site_id' => $site_id,
            ]);

            // asign layout to site
            $ASIGN_LAYOUT_SETTINGS = Layout_settings::create([
                'site_id' => $site_id,
                'key' => 'logo',
                'value' => 'logo-sample.png'
            ]);

            $ASIGN_LAYOUT_SETTINGS = Layout_settings::create([
                'site_id' => $site_id,
                'key' => 'color',
                'value' => '#d63939'
            ]);

            $ASIGN_LAYOUT_SETTINGS = Layout_settings::create([
                'site_id' => $site_id,
                'key' => 'display',
                'value' => '1'
            ]);

            $ASIGN_LAYOUT_SETTINGS = Layout_settings::create([
                'site_id' => $site_id,
                'key' => 'payment_fee',
                'value' => '0'
            ]);

            $USER_BANK = User_bank::create([
                'site_id' => $site_id,
                'bank_id' => '4',
                'account_name' => 'Nama Kamu',
                'account_number' => '898903493893'
            ]);

            $USER_PAYMENT = User_payment::create([
                'site_id' => $site_id,
                'payment_id' => '1',
            ]);

            $USER_PAYMENT = User_payment::create([
                'site_id' => $site_id,
                'payment_id' => '2',
            ]);

            // create new step
            $CREATE_STEP = Build_status::create([
                'domain_name' => $domain,
                'build_link' => $subdomain,
                'step' => 1,
                'step_status' => 0
            ]);

        } else {

            $site_id = Site::where('domain_name', $domain)->first()->id;

        }

        $customer_email = Users::where('id',auth()->user()->id)->first()->email;

        return view('pages/frond/building', [
            'subscription_id' => $site_id,
            'domain' => $domain,
            'build_link' => $subdomain,
            'customer_email' => $customer_email
        ]);

    }


    public function create_subdomain(Request $request)
    {
        
        try {
            
            $get_status = Build_status::where('domain_name', $request->domain)->where('step', 1)->first();
        
            if($get_status->step_status == 0) {

                $ex = explode('.', $request->domain);
                $domain = $ex[0];

                $response = Http::withToken(env('BACKEND_TOKEN'))
                ->post(env('BACKEND_URL').'/site/create/subdomain', [
                        "subscription_id" => $request->subscription_id,
                        "subdomain" => $domain,
                ])->json();

                if($response['status'] == 'success') {
                    
                    // mapping domain id to subscription
                    Site::where('id', $request->subscription_id)
                    ->update([
                        'site_id'=> $response['response']['data']['site_id'],
                        'domain_id'=> $response['response']['data']['domain_id']
                        ]
                    );

                    Build_status::where('domain_name', $request->domain)
                    ->where('step', 1)
                    ->update(['step_status'=>1]);

                    // create new step
                    $CREATE_STEP = Build_status::create([
                        'domain_name' => $request->domain,
                        'build_link' => $request->build_link,
                        'step' => 2,
                        'step_status' => 0
                    ]);

                    return response()->json($response);

                } else {

                    return response()->json([
                        "status" => "failed"
                    ]);

                }


            } else {

                $subscriptions = Site::where('id',$request->subscription_id)->first();

                return response()->json([
                    "status" => "success",
                    "response" => [
                        "data"=> [
                            "site_id" => $subscriptions->site_id,
                            "domain_id" => $subscriptions->domain_id
                        ]
                    ]
                ]);
            } 

        } catch (\Throwable $th) {
            return response()->json(["status" => "failed", 'response' => $th->getMessage()]);
        }

    }

    public function create_database(Request $request)
    {
        try {
            
            $get_status = Build_status::where('domain_name', $request->domain)->where('step', 2)->first();
        
            if($get_status->step_status == 0) {

                $response = Http::withToken(env('BACKEND_TOKEN'))
                    ->post(env('BACKEND_URL').'/site/create/database', [
                    "db_name" => $request->domain,
                ])->json();

                if($response['status'] == 'success') {
                    Build_status::where('domain_name', $request->domain)
                    ->where('step', 2)
                    ->update(['step_status'=> 1]);

                    // create new step
                    $CREATE_STEP = Build_status::create([
                        'domain_name' => $request->domain,
                        'build_link' => $request->build_link,
                        'step' => 3,
                        'step_status' => 0
                    ]);

                }

                return response()->json($response);

            } else {
                return response()->json(["status" => "success"]);
            } 

        } catch (\Throwable $th) {
            return response()->json(["status" => "failed", 'response' => $th->getMessage()]);
        }
    }

    public function create_ssl(Request $request)
    {
        try {
            
            $get_status = Build_status::where('domain_name', $request->domain_name)->where('step', 3)->first();
        
            if($get_status->step_status == 0) {

                $response = Http::withToken(env('BACKEND_TOKEN'))
                    ->post(env('BACKEND_URL').'/site/generate/ssl', [
                    "domain_name" => $request->domain_name,
                ])->json();

                if($response['status'] == 'success') {
                    
                    Build_status::where('domain_name', $request->domain_name)
                    ->where('step', 3)
                    ->update(['step_status'=> 1]);

                    // create new step
                    $CREATE_STEP = Build_status::create([
                        'domain_name' => $request->domain_name,
                        'build_link' => $request->build_link,
                        'step' => 4,
                        'step_status' => 0
                    ]);

                }

                return response()->json($response);

            } else {
                return response()->json([
                    "status" => "success"
                ]);
            } 

        } catch (\Throwable $th) {
            return response()->json(["status" => "failed", 'response' => $th->getMessage()]);
        }
    }

    public function create_cms(Request $request)
    {
        try {
            
            $get_status = Build_status::where('domain_name', $request->domain_name)->where('step', 4)->first();
        
            if($get_status->step_status == 0) {

                $response = Http::withToken(env('BACKEND_TOKEN'))
                    ->post(env('BACKEND_URL').'/site/install/cms', [
                    "domain_id" => $request->domain_id,
                ])->json();

                if($response['status'] == 'success') {

                    Build_status::where('domain_name', $request->domain_name)
                    ->where('step', 4)
                    ->update(['step_status'=> 1]);

                    // create account login editor
                    $EDITOR_LOGIN = User_editor::create([
                        'site_id' => $request->subscription_id,
                        'username_editor' => $request->customer_email,
                        'password_editor' => Str::random(6)
                    ]);

                    // create new step
                    $CREATE_STEP = Build_status::create([
                        'domain_name' => $request->domain_name,
                        'build_link' => $request->build_link,
                        'step' => 5,
                        'step_status' => 0
                    ]);

                }

                return response()->json($response);

            } else {
                return response()->json([
                    "status" => "success"
                ]);
            }

        } catch (\Throwable $th) {
            return response()->json(["status" => "failed", 'response' => $th->getMessage()]);
        }
    }

    public function setup_cms(Request $request)
    {
        try {
            
            $get_status = Build_status::where('domain_name', $request->domain_name)->where('step', 5)->first();
        
            if($get_status->step_status == 0) {

                $editor = User_editor::where('site_id', $request->subscription_id)->first();

                $response = Http::withToken(env('BACKEND_TOKEN'))
                    ->post(env('BACKEND_URL').'/site/setup/cms', [
                    "domain_id" => $request->domain_id,
                    "db_name" => $request->domain_name,
                    "email_login" => $editor->username_editor,
                    "pass_login" => $editor->password_editor,
                ])->json();

                if($response['status'] == 'success') {

                    Build_status::where('domain_name', $request->domain_name)
                    ->where('step', 5)
                    ->update(['step_status'=> 1]);

                }

                return response()->json($response);

            } else {
                return response()->json(["status" => "success"]);
            } 

        } catch (\Throwable $th) {
            return response()->json(["status" => "failed", 'response' => $th->getMessage()]);
        }
    }



}
