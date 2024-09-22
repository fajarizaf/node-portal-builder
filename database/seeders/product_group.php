<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class product_group extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_group')->insert([
            'user_id' => '2',
            'product_group_name' => 'Webiste Builder',
            'product_group_link' => 'dkfjshwerutksjdg',
        ]);

        DB::table('product_group')->insert([
            'user_id' => '2',
            'product_group_name' => 'Webiste Builder + Jasa Pembuatan',
            'product_group_link' => 'dkfjshwerutksjdg1',
        ]);

    }
}
