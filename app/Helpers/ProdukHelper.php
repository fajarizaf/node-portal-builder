<?php

namespace App\Helpers;
use App\Models\Build_status;
use App\Models\Product_group;
use App\Models\Product_photo;
use App\Models\Product_plan;
use App\Models\Product_asigned;
use App\Models\Product_price;
use App\Models\Site;
use Session;

class ProdukHelper
{
    public static function get_siteid_byproduk($product_id) {

        $id = Product_asigned::where('product_id',$product_id)->first()->site_id;
        return $id;

    }

    public static function get_product_owner($product_id) {

        $user_id = Product_plan::where('id',$product_id)->first()->user_id;
        return $user_id;

    }

    public static function get_url_photo($product_id) {

        $photo = Product_photo::where('product_id',$product_id)->where('photo_index',1)->first();
        if(!empty($photo)) {
            return '../storage/uploads/'.$photo->photo;
        } else {
            return '../storage/product.png';
        }

    }

    public static function create_dummy_product($site_id)
    {

        // create dummy product group
            $CREATE_PRODUCT_GROUP = Product_group::create([
                'user_id' => Session::get('user_id'),
                'product_group_name' => 'Ebook Marketing',
                'product_group_link' => 'dsafaf',
            ]);

                $encode_link3 = urlencode(base64_encode($CREATE_PRODUCT_GROUP->id));

                Product_group::where('id', $CREATE_PRODUCT_GROUP->id) ->update(['product_group_link'=>$encode_link3]);

            // create dummy product plan
            $CREATE_PRODUCT_PLAN_1 = Product_plan::create([
                'user_id' => Session::get('user_id'),
                'product_type' => 'produk digital',
                'product_group_id' => $CREATE_PRODUCT_GROUP->id,
                'product_plan_name' => 'Digital Marketing Fundamental',
                'product_plan_desc' => 'Buat yang baru mau terjun dan belajar di dunia digital marketing',
                'product_plan_link' => 'sadf34',
                'product_source_type' => 'local',
                'product_source' => 'ebook-digital-marketing.pdf',
                'is_hidden' => '1003'
            ]);

                $encode_link = urlencode(base64_encode($CREATE_PRODUCT_PLAN_1->id));

                Product_plan::where('id', $CREATE_PRODUCT_PLAN_1->id)->update(['product_plan_link'=>$encode_link]);

            $CREATE_PRODUCT_PHOTO_1 = Product_photo::create([
                'product_id' => $CREATE_PRODUCT_PLAN_1->id,
                'photo_index' => 1,
                'photo' => 'example/sample-produk-1.png',
            ]);

            // create dummy product plan
            $CREATE_PRODUCT_PRICE_1 = Product_price::create([
                'product_id' => $CREATE_PRODUCT_PLAN_1->id,
                'product_type' => 'onetime',
                'billing_cycle' => 'Monthly',
                'price' => '50000',
                'is_enable' => 1
            ]);

            $CREATE_PRODUCT_PLAN_2 = Product_plan::create([
                'user_id' => Session::get('user_id'),
                'product_type' => 'produk digital',
                'product_group_id' => $CREATE_PRODUCT_GROUP->id,
                'product_plan_name' => 'Digital Marketing Concept',
                'product_plan_desc' => 'Buat yang baru mau terjun dan belajar di dunia digital marketing',
                'product_plan_link' => 'sadf34e3',
                'product_source_type' => 'local',
                'product_source' => 'ebook-digital-marketing.pdf',
                'is_hidden' => '1003'
            ]);

                $encode_link2 = urlencode(base64_encode($CREATE_PRODUCT_PLAN_2->id));

                Product_plan::where('id', $CREATE_PRODUCT_PLAN_2->id)->update(['product_plan_link'=>$encode_link2]);

            $CREATE_PRODUCT_PHOTO_2 = Product_photo::create([
                'product_id' => $CREATE_PRODUCT_PLAN_2->id,
                'photo_index' => 1,
                'photo' => 'example/sample-produk-2.png',
            ]);

            // create dummy product plan
            $CREATE_PRODUCT_PRICE_2 = Product_price::create([
                'product_id' => $CREATE_PRODUCT_PLAN_2->id,
                'product_type' => 'onetime',
                'billing_cycle' => 'Monthly',
                'price' => '100000',
                'is_enable' => 1
            ]);


            $CREATE_PRODUCT_PLAN_3 = Product_plan::create([
                'user_id' => Session::get('user_id'),
                'product_type' => 'produk digital',
                'product_group_id' => $CREATE_PRODUCT_GROUP->id,
                'product_plan_name' => 'Viral Digital Marketing',
                'product_plan_desc' => 'Buat yang baru mau terjun dan belajar di dunia digital marketing',
                'product_plan_link' => 'sadf34e3',
                'product_source_type' => 'local',
                'product_source' => 'ebook-digital-marketing.pdf',
                'is_hidden' => '1003'
            ]);

                $encode_link3 = urlencode(base64_encode($CREATE_PRODUCT_PLAN_3->id));

                Product_plan::where('id', $CREATE_PRODUCT_PLAN_3->id)->update(['product_plan_link'=>$encode_link3]);

            $CREATE_PRODUCT_PHOTO_3 = Product_photo::create([
                'product_id' => $CREATE_PRODUCT_PLAN_3->id,
                'photo_index' => 1,
                'photo' => 'example/sample-produk-3.png',
            ]);

            // create dummy product plan
            $CREATE_PRODUCT_PRICE_3 = Product_price::create([
                'product_id' => $CREATE_PRODUCT_PLAN_3->id,
                'product_type' => 'onetime',
                'billing_cycle' => 'Monthly',
                'price' => '100000',
                'is_enable' => 1
            ]);

            $CREATE_PRODUCT_PLAN_4 = Product_plan::create([
                'user_id' => Session::get('user_id'),
                'product_type' => 'produk digital',
                'product_group_id' => $CREATE_PRODUCT_GROUP->id,
                'product_plan_name' => 'Digital Marketing di era 6.0',
                'product_plan_desc' => 'Buat yang baru mau terjun dan belajar di dunia digital marketing',
                'product_plan_link' => 'sadf34e3',
                'product_source_type' => 'local',
                'product_source' => 'ebook-digital-marketing.pdf',
                'is_hidden' => '1003'
            ]);

                $encode_link4 = urlencode(base64_encode($CREATE_PRODUCT_PLAN_4->id));

                Product_plan::where('id', $CREATE_PRODUCT_PLAN_4->id)->update(['product_plan_link'=>$encode_link4]);

            $CREATE_PRODUCT_PHOTO_4 = Product_photo::create([
                'product_id' => $CREATE_PRODUCT_PLAN_4->id,
                'photo_index' => 1,
                'photo' => 'example/sample-produk-4.png',
            ]);

            // create dummy product plan
            $CREATE_PRODUCT_PRICE_4 = Product_price::create([
                'product_id' => $CREATE_PRODUCT_PLAN_4->id,
                'product_type' => 'onetime',
                'billing_cycle' => 'Monthly',
                'price' => '100000',
                'is_enable' => 1
            ]);

            // asign product to site
            $ASIGN_PRODUCT_1 = Product_asigned::create([
                'product_id' => $CREATE_PRODUCT_PLAN_1->id,
                'site_id' => $site_id,
            ]);

            // asign product to site
            $ASIGN_PRODUCT_2 = Product_asigned::create([
                'product_id' => $CREATE_PRODUCT_PLAN_2->id,
                'site_id' => $site_id,
            ]);

            // asign product to site
            $ASIGN_PRODUCT_3 = Product_asigned::create([
                'product_id' => $CREATE_PRODUCT_PLAN_3->id,
                'site_id' => $site_id,
            ]);

            // asign product to site
            $ASIGN_PRODUCT_4 = Product_asigned::create([
                'product_id' => $CREATE_PRODUCT_PLAN_4->id,
                'site_id' => $site_id,
            ]);

            return $site_id;

    }

}