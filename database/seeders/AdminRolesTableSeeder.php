<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_roles')->truncate();

        DB::table('admin_roles')->insert([
            ['id' => 1, 'name' => 'Master Admin', 'modules' => null, 'status' => 1, 'created_at' => now(), 'updated_at' => now()]
        ]);


    }
}
