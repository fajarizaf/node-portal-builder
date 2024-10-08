<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            site_status::class,
            user_roles::class,
            users::class,
            site_payment_method::class,
            product_group::class,
            product_plan::class,
            product_price::class,
            site_layout::class,
            user_order::class,
            user_package::class,
        ]);

    }
}
