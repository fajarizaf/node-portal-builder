<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class product_price extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('product_price')->insert([
            'product_id' => 1,
            'product_type' => 'recuring',
            'billing_cycle' => 'Onetime',
            'price' => '0',
            'is_enable' => 1,
        ]);

        DB::table('product_price')->insert([
            'product_id' => 2,
            'product_type' => 'recuring',
            'billing_cycle' => 'Monthly',
            'price' => '50000',
            'is_enable' => 1,
        ]);

        DB::table('product_price')->insert([
            'product_id' => 2,
            'product_type' => 'recuring',
            'billing_cycle' => 'Quarterly',
            'price' => '150000',
            'is_enable' => 1,
        ]);

        DB::table('product_price')->insert([
            'product_id' => 2,
            'product_type' => 'recuring',
            'billing_cycle' => 'Semi-Annualy',
            'price' => '300000',
            'is_enable' => 1,
        ]);

        DB::table('product_price')->insert([
            'product_id' => 2,
            'product_type' => 'recuring',
            'billing_cycle' => 'Annualy',
            'price' => '600000',
            'is_enable' => 1,
        ]);

        DB::table('product_price')->insert([
            'product_id' => 3,
            'product_type' => 'recuring',
            'billing_cycle' => 'Monthly',
            'price' => '150000',
            'is_enable' => 1,
        ]);

        DB::table('product_price')->insert([
            'product_id' => 3,
            'product_type' => 'recuring',
            'billing_cycle' => 'Quarterly',
            'price' => '250000',
            'is_enable' => 1,
        ]);

        DB::table('product_price')->insert([
            'product_id' => 3,
            'product_type' => 'recuring',
            'billing_cycle' => 'Semi-Annualy',
            'price' => '500000',
            'is_enable' => 1,
        ]);

        DB::table('product_price')->insert([
            'product_id' => 3,
            'product_type' => 'recuring',
            'billing_cycle' => 'Annualy',
            'price' => '900000',
            'is_enable' => 1,
        ]);

    }
}
