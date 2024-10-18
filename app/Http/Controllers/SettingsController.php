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
use App\Models\User_verification;
use App\Models\User_verifications;
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

class SettingsController extends Controller
{

    public function profile(Request $request) {

        $profile = Users::where('id', auth()->user()->id)->first();

        if($request->name) {
            Users::where('id',auth()->user()->id)->update([
                'name' => $request->name,
                'telp' => $request->telp,
            ]);

            return redirect('/manage/profile')->with('success', 'Perubahan berhasil dilakukan');
        }

        return view('pages/manage/pengaturan/profile',[
            'profile' => $profile
        ]);

    }

    public function verifikasi(Request $request) {

        try {
            
        $data_verification = User_verifications::where('user_id', auth()->user()->id)->count();

        if($request->nomor_ktp) {

            $validation = $request->validate([
                'nama' => 'required',
                'nomor_ktp' => 'required',
                'dokument_ktp' => 'required|image|mimes:jpg,png,jpeg,gif|max:1024',
                'dokument_buku_tabungan' => 'required|image|mimes:jpg,png,jpeg,gif|max:1024',
            ]);

                $upload_ktp = $request->file('dokument_ktp');
                $file_name_ktp = $upload_ktp->hashName();
                $upload_ktp->storeAs('public/uploads/verification', $file_name_ktp);

                $upload_tabungan = $request->file('dokument_ktp');
                $file_name_tabungan = $upload_tabungan->hashName();
                $upload_tabungan->storeAs('public/uploads/verification', $file_name_tabungan);

                $create_verification = User_verifications::create([
                    'user_id' => auth()->user()->id,
                    'nama'=> $request->nama,
                    'nomor_ktp' => $request->nomor_ktp,
                    'dokument_ktp' => $file_name_ktp,
                    'dokument_buku_tabungan' => $file_name_tabungan,
                    'status_id' => '1003'
                ]);

                return redirect('/manage/profile/verifikasi')->with('success', 'Pengajuan verifikasi akun kamu telah kami terima, tunggu 1x24 jam untuk di proses atau chat kami melalui nomor whatsapp');
            

        }

        return view('pages/manage/pengaturan/profile-verifikasi',[
            'data_verification' => $data_verification
        ]);

        } catch (\Throwable $th) {
            return redirect('/manage/profile/verifikasi')->with('failed', 'Pengajuan verifikasi kamu telah gagal,form isian data tidak valid');
        }

    }


}
