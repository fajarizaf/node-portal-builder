<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

use App\Http\Controllers\Controller;
use App\Models\Product_plan;
use App\Models\Product_group;
use App\Models\Product_price;

class ProductController extends Controller
{
      /**
     * Show the profile for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */

    public function list()
    {
        $product = Product_plan::latest();
        $product->join('product_group', 'product_group.id', '=', 'product_plan.product_group_id');
        $product->select('product_plan.id','product_plan.product_plan_name','product_plan.product_plan_link','product_group.product_group_name','product_plan.created_at');

        $product_group = Product_group::get();

        return view('pages/manage/product',[
                'product' => $product->paginate(2)->withQueryString(),
                'product_group' => $product_group
        ]);
    }

    public function add(Request $request)
    {

        $PRODUCT_PLAN = Product_plan::create([
           'user_id' => 2,
           'product_group_id' => $request->kategori_produk,
           'product_plan_name' => $request->nama_produk,
           'product_plan_code' => $request->kode_produk,
           'product_plan_desc' => $request->deskripsi_produk,
           'product_stock' => $request->stock_produk,
        ]);

        if(!empty($PRODUCT_PLAN->id)) {

            $encode_link = urlencode(base64_encode($PRODUCT_PLAN->id));

            $post = Product_plan::where('id',$PRODUCT_PLAN->id)->update([
                'product_plan_link' => $encode_link,
            ]);

            $PRODUCT_PRICE = Product_price::create([
                'product_id' => $PRODUCT_PLAN->id,
                'product_type' => $request->tipe_produk,
                'billing_cycle' => $request->siklus_tagihan,
                'price' => $request->harga_produk,
                'is_enable' => 1,
            ]);

            return redirect('/manage/product')->with('success', 'Produk berhasil ditambahkan');

        } else {

            return redirect('/manage/product')->with('failed', 'Produk gagal ditambahkan, open tiket untuk pengaduan masalah ini');

        }

    }


}
