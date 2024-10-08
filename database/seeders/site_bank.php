<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class site_bank extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_banks')->insert([
            'bank_name' => "Bank BCA",
            'bank_logo' => 'bca.png',
        ]);

        DB::table('site_banks')->insert([
            'bank_name' => "Bank BNI",
            'bank_logo' => 'bni.png',
        ]);

        DB::table('site_banks')->insert([
            'bank_name' => "Bank BRI",
            'bank_logo' => 'bri.png',
        ]);

        DB::table('site_banks')->insert([
            'bank_name' => "Bank Mandiri",
            'bank_logo' => 'mandiri.png',
        ]);
    }
}
