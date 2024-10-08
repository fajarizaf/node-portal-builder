<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class user_roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('user_roles')->insert([
            'role_name' => 'administrator',
            'role_type' => 'owner',
            'status_id' => '1001'
        ]);

        DB::table('user_roles')->insert([
            'role_name' => 'customer',
            'role_type' => 'reseller',
            'status_id' => '1001'
        ]);

        DB::table('user_roles')->insert([
            'role_name' => 'customer',
            'role_type' => 'seller',
            'status_id' => '1001'
        ]);

        DB::table('user_roles')->insert([
            'role_name' => 'customer',
            'role_type' => 'buyer',
            'status_id' => '1001'
        ]);

    }
}
