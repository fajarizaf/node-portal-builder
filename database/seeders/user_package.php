<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class user_package extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_package')->insert([
            'user_id' => 2,
            'reseller_id' => 2,
            'order_id' => 1,
            "product_plan_id" => 2,
            'billing_cycle' => 'Annualy',
            'amount' => '150000',
            'is_free' => 1,
            'next_due_date' => '2025-01-04',
            'active_date' => '2024-01-04',
            'status_id' => '1001'
        ]);
    }
}
