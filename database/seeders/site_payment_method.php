<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class site_payment_method extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_payment_method')->insert([
            'payment_method_name' => 'Bank Transfer',
            'payment_method_logo' => 'bank_transfer.png',
            'is_active' => 1,
        ]);

        DB::table('site_payment_method')->insert([
            'payment_method_name' => 'COD',
            'payment_method_logo' => 'cod.png',
            'is_active' => 1,
        ]);

    }
}
