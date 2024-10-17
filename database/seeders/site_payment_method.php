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
            'payment_method_group' => 'Manual Transfer',
            'channel_id' => 'TF',
            'fee' => 0,
            'payment_method_logo' => 'transfer.png',
            'is_active' => 1,
        ]);

        DB::table('site_payment_method')->insert([
            'payment_method_name' => 'COD',
            'payment_method_group' => 'Bayar Ditempat',
            'channel_id' => 'COD',
            'fee' => 0,
            'payment_method_logo' => 'cod.png',
            'is_active' => 0,
        ]);

        DB::table('site_payment_method')->insert([
            'payment_method_name' => 'Maybank VA',
            'payment_method_group' => 'Virtual Account',
            'gateway' => 'DUITKU',
            'channel_id' => 'VA',
            'fee' => 3000,
            'payment_method_logo' => 'maybank.png',
            'is_active' => 1,
        ]);

        DB::table('site_payment_method')->insert([
            'payment_method_name' => 'Permata VA',
            'payment_method_group' => 'Virtual Account',
            'gateway' => 'DUITKU',
            'channel_id' => 'BT',
            'fee' => 3000,
            'payment_method_logo' => 'permata.png',
            'is_active' => 1,
        ]);

        DB::table('site_payment_method')->insert([
            'payment_method_name' => 'CIMB Niaga VA',
            'payment_method_group' => 'Virtual Account',
            'gateway' => 'DUITKU',
            'channel_id' => 'B1',
            'fee' => 3000,
            'payment_method_logo' => 'cimb.png',
            'is_active' => 1,
        ]);

        DB::table('site_payment_method')->insert([
            'payment_method_name' => 'BNI VA',
            'payment_method_group' => 'Virtual Account',
            'gateway' => 'DUITKU',
            'channel_id' => 'I1',
            'fee' => 3000,
            'payment_method_logo' => 'bni.png',
            'is_active' => 1,
        ]);

        DB::table('site_payment_method')->insert([
            'payment_method_name' => 'Mandiri VA',
            'payment_method_group' => 'Virtual Account',
            'gateway' => 'DUITKU',
            'channel_id' => 'M2',
            'fee' => 4000,
            'payment_method_logo' => 'mandiri.png',
            'is_active' => 1,
        ]);

        DB::table('site_payment_method')->insert([
            'payment_method_name' => 'Artha Graha VA',
            'payment_method_group' => 'Virtual Account',
            'gateway' => 'DUITKU',
            'channel_id' => 'AG',
            'fee' => 1500,
            'payment_method_logo' => 'ag.png',
            'is_active' => 1,
        ]);

        DB::table('site_payment_method')->insert([
            'payment_method_name' => 'BCA VA',
            'payment_method_group' => 'Virtual Account',
            'gateway' => 'DUITKU',
            'channel_id' => 'BC',
            'fee' => 5000,
            'payment_method_logo' => 'bca.png',
            'is_active' => 1,
        ]);

        DB::table('site_payment_method')->insert([
            'payment_method_name' => 'BRI VA',
            'payment_method_group' => 'Virtual Account',
            'gateway' => 'DUITKU',
            'channel_id' => 'BR',
            'fee' => 3000,
            'payment_method_logo' => 'bri.png',
            'is_active' => 1,
        ]);

        DB::table('site_payment_method')->insert([
            'payment_method_name' => 'BSI VA',
            'payment_method_group' => 'Virtual Account',
            'gateway' => 'DUITKU',
            'channel_id' => 'BV',
            'fee' => 3000,
            'payment_method_logo' => 'bsi.png',
            'is_active' => 1,
        ]);

    }
}
