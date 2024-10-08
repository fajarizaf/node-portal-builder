<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class site_layout extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('site_layout')->insert([
            'layout_name' => "Single Checkout",
            'layout_thumbnail' => 'single-checkout.png',
        ]);

    }
}
