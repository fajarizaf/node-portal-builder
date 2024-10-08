<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class product_plan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('product_plan')->insert([
            'user_id' => 2,
            'product_type' => 'produk digital',
            'product_group_id' => 1,
            'product_plan_name' => 'Node Basic',
            'product_plan_desc' => 'Cocok untuk pemula yang baru punya website',
            'product_plan_link' => 'MQ%3D%3D',
            'is_hidden' => 0,
        ]);

        DB::table('product_plan')->insert([
            'user_id' => 2,
            'product_type' => 'produk digital',
            'product_group_id' => 1,
            'product_plan_name' => 'Node Pro Edition',
            'product_plan_desc' => 'Cocok untuk para pelaku usaha yang sudah mulai jalan usahanya',
            'product_plan_link' => 'Mg%3D%3D',
            'is_hidden' => 0,
        ]);

    }
}
