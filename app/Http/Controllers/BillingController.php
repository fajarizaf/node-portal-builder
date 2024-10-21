<?php

namespace App\Http\Controllers;

use App\Helpers\BillingHelper;
use App\Models\Product_asigned;
use App\Models\Product_photo;
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
use PackageHelper;
use ProdukHelper;
use SiteHelper;

class BillingController extends Controller
{

    public function tagihan(Request $request) {

        $invoices = User_invoices::latest();

        $invoices->where('user_invoices.user_id', auth()->user()->id);
        $invoices->where('user_order.seller_id',2);
        $invoices->join('user_invoices_item', 'user_invoices_item.invoices_id', '=', 'user_invoices.id');
        $invoices->join('user_order_item', 'user_order_item.order_id', '=', 'user_invoices_item.order_id');
        $invoices->join('user_order', 'user_order.id', '=', 'user_order_item.order_id');
        $invoices->join('site_status', 'site_status.status_code', '=', 'user_invoices.status_id');
        $invoices->orderBy('user_invoices.invoices_date','desc');

        $invoices->select(
            'user_invoices.id',
            'user_invoices.id',
            'user_invoices.invoices_type',
            'user_order.created_at',
            'user_order_item.billing_cycle',
            'user_invoices_item.item_name',
            'user_invoices.invoices_date',
            'user_invoices.invoices_duedate',
            'site_status.status_name',
            'user_invoices.total'
        );

        $package = PackageHelper::Get_info(auth()->user()->id);

        return view('pages/manage/pengaturan/tagihan-list',[
            'invoices' => $invoices->paginate(10)->withQueryString(),
            'package' => $package
        ]);

    }

    public function penarikan(Request $request) {

        $status_verifikasi = User_verifications::where('user_id',auth()->user()->id)->where('status_id','1006')->count();

        $site_bank = Site_banks::get();
        $site_rekening = User_rekening::where('user_id', auth()->user()->id)->join('site_banks','site_banks.id','user_rekening.bank_id')->first();
        $count_rekening = User_rekening::where('user_id', auth()->user()->id)->count();
        
        $histori_penarikan = User_witdraws::where('user_id', auth()->user()->id)
        ->join('site_status','site_status.status_code','=','user_witdraw.status_id')
        ->select('user_witdraw.id', 
            'user_witdraw.payment_method',
            'user_witdraw.bank',
            'user_witdraw.no_rek',
            'user_witdraw.nama_rek',
            'user_witdraw.amount',
            'site_status.status_name',
        )
        ->get();

        return view('pages/manage/pengaturan/penarikan-list',[
            'status_verifikasi' => $status_verifikasi,
            'site_bank' => $site_bank,
            'user_rekening' => $site_rekening,
            'count_rekening' => $count_rekening,
            'saldo_active' => BillingHelper::saldo_active(),
            'saldo_pending' => BillingHelper::saldo_pending(),
            'histori_penarikan' => $histori_penarikan
        ]);

    }


    public function request_penarikan(Request $request) {

        try {

            $saldo_active = BillingHelper::saldo_active();

            if($request->nominal <= $saldo_active) {

                $request->validate([
                    'nominal' => 'required',
                    'bank' => 'required',
                    'account_name' => 'required',
                    'account_number' => 'required',
                ]);

                $add = User_witdraws::create([
                        'user_id' => auth()->user()->id,
                        'payment_method'=> 'Bank Transfer',
                        'bank' => $request->bank,
                        'no_rek' => $request->account_number,
                        'nama_rek' => $request->account_name,
                        'amount' => $request->nominal,
                        'notes' => $request->notes,
                        'status_id' => '1003',
                    ]);
                
                return redirect('/manage/penarikan')->with('success', 'Pengajuan pencairan anda telah kami terima, tunggu 1 x 24 jam untuk di proses, atau kontak nomor whatsapp admin kami');
            } else {
                return redirect('/manage/penarikan')->with('failed', 'Nominal penarikan tidak boleh lebih dari saldo aktif anda');
            }
        } catch (\Throwable $th) {
            return redirect('/manage/penarikan')->with('failed', 'Pengajuan pencairan gagal');

        }

    }


    public function add_rekening(Request $request) {

        try {
            
            $request->validate([
                'account_bank' => 'required',
                'account_name' => 'required',
                'account_number' => 'required',
            ]);

            $add = User_rekening::create([
                    'user_id' => auth()->user()->id,
                    'bank_id'=> $request->account_bank,
                    'account_name' => $request->account_name,
                    'account_number' => $request->account_number,
                ]);
            
            return redirect('/manage/penarikan')->with('success', 'Rekening tujuan pencairan dana berhasil ditambahkan');

        } catch (\Throwable $th) {

            return redirect('/manage/penarikan')->with('failed', 'Gagal menambahkan rekening tujuan pencairan');

        }

    }


    public function update_rekening(Request $request) {

        try {
            
            $request->validate([
                'account_bank' => 'required',
                'account_name' => 'required',
                'account_number' => 'required',
            ]);

            $update = User_rekening::where('user_id',auth()->user()->id)->update([
                'bank_id'=> $request->account_bank,
                'account_name' => $request->account_name,
                'account_number' => $request->account_number,
            ]);
            
            return redirect('/manage/penarikan')->with('success', 'Pembaharuan rekening tujuan pencairan dana berhasil');

        } catch (\Throwable $th) {

            return redirect('/manage/penarikan')->with('failed', 'Gagal Pembaharuan rekening tujuan pencairan');

        }

    }

}
