<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->truncate();

        DB::table('reviews')->insert([
            ['id' => 1, 'food_id' => 3, 'user_id' => 3, 'comment' => 'Very delicious food. It was really awesome. Thanks to the restaurant.', 'attachment' => '[]', 'rating' => 5, 'order_id' => 100001, 'created_at' => now(), 'updated_at' => now(), 'item_campaign_id' => null, 'status' => 1],
            ['id' => 2, 'food_id' => 67, 'user_id' => 9, 'comment' => 'Nice', 'attachment' => '[]', 'rating' => 4, 'order_id' => 100008, 'created_at' => now(), 'updated_at' => now(), 'item_campaign_id' => null, 'status' => 1]
        ]);


    }
}
