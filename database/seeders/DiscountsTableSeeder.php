<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discounts')->truncate();

        DB::table('discounts')->insert([
            ['id' => 1, 'start_date' => '2021-08-20', 'end_date' => '2023-02-21', 'start_time' => '00:00:00', 'end_time' => '23:59:00', 'min_purchase' => 150, 'max_discount' => 100, 'discount' => 15, 'discount_type' => 'percent', 'restaurant_id' => 2, 'created_at' => now(), 'updated_at' => now()]
        ]);


    }
}
