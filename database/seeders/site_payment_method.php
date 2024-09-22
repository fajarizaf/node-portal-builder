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
            'payment_method_info' => 'Transfer ke rekening BCA Atas Nama Fajar Riza Fauzi No Rekening 83739348453',
            'is_active' => 1,
        ]);
    }
}
