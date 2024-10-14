<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class product_plan_fitur extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('product_plan_fitur')->insert([
            'product_id' => 1,
            'key' => 'produk',
            'value' => 6,
        ]);

        DB::table('product_plan_fitur')->insert([
            'product_id' => 1,
            'key' => 'order',
            'value' => 100,
        ]);

        DB::table('product_plan_fitur')->insert([
            'product_id' => 1,
            'key' => 'site',
            'value' => 1,
        ]);


        DB::table('product_plan_fitur')->insert([
            'product_id' => 2,
            'key' => 'produk',
            'value' => 20,
        ]);

        DB::table('product_plan_fitur')->insert([
            'product_id' => 2,
            'key' => 'order',
            'value' => 1000,
        ]);

        DB::table('product_plan_fitur')->insert([
            'product_id' => 2,
            'key' => 'site',
            'value' => 5,
        ]);


        DB::table('product_plan_fitur')->insert([
            'product_id' => 3,
            'key' => 'produk',
            'value' => 40,
        ]);

        DB::table('product_plan_fitur')->insert([
            'product_id' => 3,
            'key' => 'order',
            'value' => 10000,
        ]);

        DB::table('product_plan_fitur')->insert([
            'product_id' => 3,
            'key' => 'site',
            'value' => 15,
        ]);

    }
}
