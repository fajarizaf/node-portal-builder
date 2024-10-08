<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class site_status extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('site_status')->insert([
            'status_name' => 'active',
            'status_code' => '1001',
        ]);

        DB::table('site_status')->insert([
            'status_name' => 'deactive',
            'status_code' => '1002',
        ]);

        DB::table('site_status')->insert([
            'status_name' => 'pending',
            'status_code' => '1003',
        ]);

        DB::table('site_status')->insert([
            'status_name' => 'paid',
            'status_code' => '1004',
        ]);

        DB::table('site_status')->insert([
            'status_name' => 'unpaid',
            'status_code' => '1005',
        ]);

        DB::table('site_status')->insert([
            'status_name' => 'complete',
            'status_code' => '1006',
        ]);
    }
}
