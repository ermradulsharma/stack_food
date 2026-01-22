<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttributesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributes')->truncate();

        DB::table('attributes')->insert([
            ['id' => 1, 'name' => 'Size', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Capacity', 'created_at' => now(), 'updated_at' => now()]
        ]);


    }
}
