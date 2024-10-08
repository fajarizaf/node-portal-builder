<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Carbon;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => 1,
            'name' => 'Fajar Riza Fauzi',
            'email' => 'admin@nodebuilder.id',
            'password' => bcrypt('nodebuilder'),
            'telp' => '+6282125649665',
            'is_active' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        DB::table('users')->insert([
            'role_id' => 2,
            'name' => 'Fajar Riza Fauzi',
            'email' => 'reseller@nodebuilder.id',
            'password' => bcrypt('nodebuilder'),
            'telp' => '+6282125649665',
            'is_active' => 1,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);
    }
}
