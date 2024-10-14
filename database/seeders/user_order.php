<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class user_order extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_order')->insert([
            'user_id' => '2',
            'seller_id' => '2',
            'sub_total' => '150000',
            'tax_rate' => '10',
            'tax' => '15000',
            'total' => '165000',
            'domain_tipe' => 'domain',
            'domain' => 'nodebuilder.id',
            'status_id' => 1001,
        ]);

        DB::table('user_order_item')->insert([
            'order_id' => 1,
            'product_id' => 2,
            'product_group_name' => 'Website Builder',
            'product_plan_name' => 'Node Pro Edition',
            'billing_cycle' => 'Annualy',
            'unit_price' => '150000',
            'qty' => 1,
        ]);
    }
}
