<?php

namespace App\Http\Controllers;

use App\Helpers\BillingHelper;
use App\Models\Product_asigned;
use App\Models\Product_photo;
use App\Models\Product_plan;
use App\Models\Site_banks;
use App\Models\User_bank;
use App\Models\User_invoices;
use App\Models\User_invoices_item;
use App\Models\User_invoices_payment;
use App\Models\User_package;
use App\Models\User_payment;
use App\Models\User_rekening;
use App\Models\User_verifications;
use App\Models\User_witdraws;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Str;

use App\Http\Controllers\Controller;
use PackageHelper;
use SiteHelper;

class CustomerController extends Controller
{

    public function download_product(Request $request) {

        $invoices_id = Crypt::decrypt($request->invoices_id);

        $inv_exist = User_invoices::where('id', $invoices_id)->count();

        if($inv_exist != 0) {

            $site_id = SiteHelper::Get_siteid_byinvoices($invoices_id);

            $product = User_invoices::where('user_invoices.id',$request->invoices_id)
            ->join('user_invoices_item','user_invoices_item.invoices_id','=', 'user_invoices.id')
            ->join('user_order','user_order.id','=','user_invoices_item.order_id')
            ->join('user_order_item','user_order_item.order_id','=','user_order.id')
            ->join('product_plan','product_plan.id','=','user_order_item.product_id')
            ->first()->product_source;

            return view('pages/frond/customer/download-product',[
                'product' => $product,
                'site_id' => $site_id
            ]);

        } else {

            return abort(404);

        }
        
    }

}
