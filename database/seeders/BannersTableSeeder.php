<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->truncate();

        DB::table('banners')->insert([
            ['id' => 1, 'title' => 'Offer', 'type' => 'restaurant_wise', 'image' => '2021-08-20-611fd481acaf1.png', 'status' => 1, 'data' => 1, 'created_at' => now(), 'updated_at' => now(), 'zone_id' => 1],
            ['id' => 2, 'title' => 'Test Banner', 'type' => 'restaurant_wise', 'image' => '2021-08-21-611ff25c7385f.png', 'status' => 1, 'data' => 4, 'created_at' => now(), 'updated_at' => now(), 'zone_id' => 1],
            ['id' => 4, 'title' => 'Fast Delivery', 'type' => 'restaurant_wise', 'image' => '2021-08-21-612003b75c7f6.png', 'status' => 1, 'data' => 2, 'created_at' => now(), 'updated_at' => now(), 'zone_id' => 1]
        ]);


    }
}
