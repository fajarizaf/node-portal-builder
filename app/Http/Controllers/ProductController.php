<?php

namespace App\Http\Controllers;
use App\Models\Product_asigned;
use App\Models\Product_photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use App\Http\Controllers\Controller;
use App\Models\Product_plan;
use App\Models\Product_group;
use App\Models\Product_price;
use App\Models\Site;
use SiteHelper;
use ProdukHelper;

class ProductController extends Controller
{
      /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
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

        return view('pages/manage/product',[
                'product' => $product->paginate(5)->withQueryString(),
                'product_group' => $product_group,
                'sites' => $site,
                'site_active' => $site_active
        ]);
    }

    public function detail($product_id)
    {
    
       $product_id = base64_decode($product_id);
        
       $site_id = ProdukHelper::get_siteid_byproduk($product_id);
        
       $product_navigation = Product_asigned::where('product_asigned.site_id',$site_id)
       ->join('product_plan','product_plan.id','=','product_asigned.product_id')
       ->join('product_group','product_group.id','=','product_plan.product_group_id')
       ->select(
            'product_plan.id',
            'product_plan.product_plan_name',
            'product_group.product_group_name',
        )->get();

        $product = Product_plan::where('product_plan.id', $product_id)
        ->join('product_group', 'product_group.id', '=', 'product_plan.product_group_id')
        ->join('product_asigned', 'product_asigned.product_id', '=', 'product_plan.id')
        ->select(
            'product_plan.id',
            'product_plan.product_stock',
            'product_plan.product_plan_name',
            'product_plan.product_plan_link',
            'product_plan.product_source',
            'product_plan.product_stock',
            'product_plan.product_source_type',
            'product_plan.product_source',
            'product_plan.product_plan_desc',
            'product_group.product_group_name',
            'product_plan.created_at'
        )->first();

        $product_price = Product_price::where('product_id',$product_id)->first();

        $product_photo_1 = Product_photo::where('product_id', $product_id)->where('photo_index','1')->first();
        $product_photo_2 = Product_photo::where('product_id', $product_id)->where('photo_index','2')->first();
        $product_photo_3 = Product_photo::where('product_id', $product_id)->where('photo_index','3')->first();
        $product_photo_4 = Product_photo::where('product_id', $product_id)->where('photo_index','4')->first();
        $product_photo_5 = Product_photo::where('product_id', $product_id)->where('photo_index','5')->first();
        $product_photo_count = Product_photo::where('product_id', $product_id)->count();
        $product_group = Product_group::where('user_id',auth()->user()->id)->get();
        
        return view('pages/manage/product-detail',[
                'product' => $product,
                'product_navigation' => $product_navigation,
                'product_active' => $product_id,
                'product_group' => $product_group,
                'product_photo_1' => $product_photo_1,
                'product_photo_2' => $product_photo_2,
                'product_photo_3' => $product_photo_3,
                'product_photo_4' => $product_photo_4,
                'product_photo_5' => $product_photo_5,
                'product_photo_count' => $product_photo_count + 1,
                'product_price' => $product_price,
                'product_id' => $product_id
        ]);
    }

    public function add(Request $request)
    {

        $this->validate($request, [
            'upload-file-1' => 'required',
        ]);

        if($request->product_source_type == 'local') {

            $request->validate([
                'input-local-file' => 'required|max:30720',
            ]);

            $uploadlocal = $request->file('input-local-file');
            $source_name = $uploadlocal->hashName();
            $uploadlocal->storeAs('public/uploads/product', $source_name);

        }

        if($request->product_source_type == 'gdrive') {

            $source_name = $request->link_gdrive;

        }

        if($request->product_source_type == 'dropbox') {

            $source_name = $request->link_dropbox;

        }

        if($request->product_source_type == 'other') {

            $source_name = $request->link_other;

        }

        $PRODUCT_PLAN = Product_plan::create([
           'user_id' => auth()->user()->id,
           'product_type'=> $request->product_type,
           'product_group_id' => $request->kategori_produk,
           'product_plan_name' => $request->nama_produk,
           'product_plan_code' => $request->kode_produk,
           'product_plan_desc' => $request->deskripsi_produk,
           'product_stock' => $request->stock_produk,
           'product_source_type' => $request->product_source_type,
           'product_source' => $source_name
        ]);

        if(!empty($PRODUCT_PLAN->id)) {

            // asign product to site

            $PRODUCT_ASIGN = Product_asigned::create([
                'product_id' => $PRODUCT_PLAN->id,
                'site_id' => $request->site_id
            ]);

            if($request->file('upload-file-1')) {

                $request->validate([
                'upload-file-1' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
                ]);

                $uploadFile_1 = $request->file('upload-file-1');
                $file_name_1 = $uploadFile_1->hashName();
                $uploadFile_1->storeAs('public/uploads', $file_name_1);
                
                $PRODUCT_PHOTO = Product_photo::create([
                    'product_id' => $PRODUCT_PLAN->id,
                    "photo_index" => 1,
                    'photo' => $file_name_1,
                ]);

            }

            if($request->file('upload-file-2')) {

                $request->validate([
                'upload-file-2' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
                ]);

                $uploadFile_2 = $request->file('upload-file-2');
                $file_name_2 = $uploadFile_2->hashName();
                $uploadFile_2->storeAs('public/uploads', $file_name_2);
                
                $PRODUCT_PHOTO = Product_photo::create([
                    'product_id' => $PRODUCT_PLAN->id,
                    "photo_index" => 2,
                    'photo' => $file_name_2,
                ]);

            }

            if($request->file('upload-file-3')) {

                $request->validate([
                'upload-file-3' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
                ]);

                $uploadFile_3 = $request->file('upload-file-3');
                $file_name_3 = $uploadFile_3->hashName();
                $uploadFile_3->storeAs('public/uploads', $file_name_3);
                
                $PRODUCT_PHOTO = Product_photo::create([
                    'product_id' => $PRODUCT_PLAN->id,
                    "photo_index" => 3,
                    'photo' => $file_name_3,
                ]);

            }

            if($request->file('upload-file-4')) {

                $request->validate([
                'upload-file-4' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
                ]);

                $uploadFile_4 = $request->file('upload-file-4');
                $file_name_4 = $uploadFile_4->hashName();
                $uploadFile_4->storeAs('public/uploads', $file_name_4);
                
                $PRODUCT_PHOTO = Product_photo::create([
                    'product_id' => $PRODUCT_PLAN->id,
                    "photo_index" => 4,
                    'photo' => $file_name_4,
                ]);

            }

            if($request->file('upload-file-5')) {

                $request->validate([
                'upload-file-5' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
                ]);

                $uploadFile_5 = $request->file('upload-file-5');
                $file_name_5 = $uploadFile_5->hashName();
                $uploadFile_5->storeAs('public/uploads', $file_name_5);
                
                $PRODUCT_PHOTO = Product_photo::create([
                    'product_id' => $PRODUCT_PLAN->id,
                    "photo_index" => 5,
                    'photo' => $file_name_5,
                ]);

            }

            $encode_link = urlencode(base64_encode($PRODUCT_PLAN->id));

            $post = Product_plan::where('id',$PRODUCT_PLAN->id)->update([
                'product_plan_link' => $encode_link,
            ]);

            $PRODUCT_PRICE = Product_price::create([
                'product_id' => $PRODUCT_PLAN->id,
                'product_type' => $request->payment_type,
                'billing_cycle' => $request->siklus_tagihan,
                'price' => $request->harga_produk,
                'is_enable' => 1,
            ]);

            return redirect('/manage/product')->with('success', 'Produk berhasil ditambahkan');

        } else {

            return redirect('/manage/product')->with('failed', 'Produk gagal ditambahkan, open tiket untuk pengaduan masalah ini');

        }

    }


    public function update(Request $request) {

        $update = Product_plan::where('id',$request->product_id)->where('user_id', auth()->user()->id)->update([
            'product_plan_name' => $request->nama_produk,
            'product_group_id' => $request->kategori_produk,
            'product_plan_desc' => $request->deskripsi_produk,
            'product_stock' => $request->stok_produk,
        ]);

        $update = Product_price::where('product_id',$request->product_id)->update([
            'price' => $request->harga_produk,
        ]);

            if($request->file('upload-file-1')) {

                $request->validate([
                'upload-file-1' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
                ]);

                $uploadFile_1 = $request->file('upload-file-1');
                $file_name_1 = $uploadFile_1->hashName();
                $uploadFile_1->storeAs('public/uploads', $file_name_1);

                $exist = Product_photo::where('product_id',$request->product_id)->where('photo_index', 1)->count();

                if($exist != 0) {
                    $update = Product_photo::where('product_id',$request->product_id)->where('photo_index',1)->update([
                        'photo' => $file_name_1,
                    ]);
                } else {
                    $create = Product_photo::create([
                        'product_id' => $request->product_id,
                        'photo_index' => 1,
                        'photo' => $file_name_1,
                    ]);
                }

            }

            if($request->file('upload-file-2')) {

                $request->validate([
                'upload-file-2' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
                ]);

                $uploadFile_2 = $request->file('upload-file-2');
                $file_name_2 = $uploadFile_2->hashName();
                $uploadFile_2->storeAs('public/uploads', $file_name_2);
                
                $exist = Product_photo::where('product_id',$request->product_id)->where('photo_index', 2)->count();

                if($exist != 0) {
                    $update = Product_photo::where('product_id',$request->product_id)->where('photo_index',2)->update([
                        'photo' => $file_name_2,
                    ]);
                } else {
                    $create = Product_photo::create([
                        'product_id' => $request->product_id,
                        'photo_index' => 2,
                        'photo' => $file_name_2,
                    ]);
                }

            }

            if($request->file('upload-file-3')) {

                $request->validate([
                'upload-file-3' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
                ]);

                $uploadFile_3 = $request->file('upload-file-3');
                $file_name_3 = $uploadFile_3->hashName();
                $uploadFile_3->storeAs('public/uploads', $file_name_3);
                
                $exist = Product_photo::where('product_id',$request->product_id)->where('photo_index', 3)->count();

                if($exist != 0) {
                    $update = Product_photo::where('product_id',$request->product_id)->where('photo_index',3)->update([
                        'photo' => $file_name_3,
                    ]);
                } else {
                    $create = Product_photo::create([
                        'product_id' => $request->product_id,
                        'photo_index' => 3,
                        'photo' => $file_name_3,
                    ]);
                }

            }

            if($request->file('upload-file-4')) {

                $request->validate([
                'upload-file-4' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
                ]);

                $uploadFile_4 = $request->file('upload-file-4');
                $file_name_4 = $uploadFile_4->hashName();
                $uploadFile_4->storeAs('public/uploads', $file_name_4);
                
                $exist = Product_photo::where('product_id',$request->product_id)->where('photo_index', 4)->count();

                if($exist != 0) {
                    $update = Product_photo::where('product_id',$request->product_id)->where('photo_index',4)->update([
                        'photo' => $file_name_4,
                    ]);
                } else {
                    $create = Product_photo::create([
                        'product_id' => $request->product_id,
                        'photo_index' => 4,
                        'photo' => $file_name_4,
                    ]);
                }

            }

            if($request->file('upload-file-5')) {

                $request->validate([
                'upload-file-5' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
                ]);

                $uploadFile_5 = $request->file('upload-file-5');
                $file_name_5 = $uploadFile_5->hashName();
                $uploadFile_5->storeAs('public/uploads', $file_name_5);
                
                $exist = Product_photo::where('product_id',$request->product_id)->where('photo_index', 5)->count();

                if($exist != 0) {
                    $update = Product_photo::where('product_id',$request->product_id)->where('photo_index',5)->update([
                        'photo' => $file_name_5,
                    ]);
                } else {
                    $create = Product_photo::create([
                        'product_id' => $request->product_id,
                        'photo_index' => 5,
                        'photo' => $file_name_5,
                    ]);
                }

            }

            if($request->product_source_type == 'local') {

                if($request->file('input-local-file')) {

                    $request->validate([
                        'input-local-file' => 'required|max:30720',
                    ]);

                    $uploadlocal = $request->file('input-local-file');
                    $source_name = $uploadlocal->hashName();
                    $uploadlocal->storeAs('public/uploads/product', $source_name);

                    $update = Product_plan::where('id',$request->product_id)->update([
                        "product_source_type" => $request->product_source_type,
                        'product_source' => $source_name,
                    ]);

                }

            }

            if($request->product_source_type == 'gdrive') {

                    $update = Product_plan::where('id',$request->product_id)->update([
                        "product_source_type" => $request->product_source_type,
                        'product_source' => $request->link_gdrive,
                    ]);

            }

            if($request->product_source_type == 'dropbox') {

                    $update = Product_plan::where('id',$request->product_id)->update([
                        "product_source_type" => $request->product_source_type,
                        'product_source' => $request->link_dropbox,
                    ]);

            }

            if($request->product_source_type == 'other') {

                    $update = Product_plan::where('id',$request->product_id)->update([
                        "product_source_type" => $request->product_source_type,
                        'product_source' => $request->link_other,
                    ]);

            }

            return redirect('/manage/product/detail/'.urlencode(base64_encode($request->product_id)))->with('success', 'Produk updated');

    }


    public function Product_asign_count($product_id,$site_id) {

        $total = Product_asigned::where('product_id',$product_id)->where('site_id',$site_id)->count();
        return $total;
    }


}
