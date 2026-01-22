<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemCampaignsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_campaigns')->truncate();

        DB::table('item_campaigns')->insert([
            ['id' => 1, 'title' => 'Spicy Crab Early Food', 'image' => '2021-08-21-612012a4962dd.png', 'description' => 'Spicy chilli crab is only mildly spicy and is often described as having a flavour that\\\'s both sweet and savoury. The crab is divine but the sauce is the star—sweet yet savoury, slightly spicy and supremely satisfying.', 'status' => 1, 'admin_id' => 1, 'start_date' => '2021-08-20', 'end_date' => '2025-08-21', 'start_time' => '00:01:00', 'end_time' => '23:59:00', 'category_id' => null, 'category_ids' => '[{\\\"id\\\":\\\"7\\\",\\\"position\\\":1}]', 'variations' => '[]', 'add_ons' => '[]', 'attributes' => '[]', 'choice_options' => '[]', 'price' => 400, 'tax' => 0, 'tax_type' => 'percent', 'discount' => 110, 'discount_type' => 'amount', 'restaurant_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'title' => 'Cheese Burger', 'image' => '2021-08-21-612015c75d9f1.png', 'description' => 'A cheeseburger is a hamburger topped with cheese. Traditionally, the slice of cheese is placed on top of the meat patty. The cheese is usually added to the cooking hamburger patty shortly before serving, which allows the cheese to melt.', 'status' => 1, 'admin_id' => 1, 'start_date' => '2021-08-20', 'end_date' => '2025-06-04', 'start_time' => '02:50:00', 'end_time' => '19:50:00', 'category_id' => null, 'category_ids' => '[{\\\"id\\\":\\\"5\\\",\\\"position\\\":1}]', 'variations' => '[]', 'add_ons' => '[]', 'attributes' => '[]', 'choice_options' => '[]', 'price' => 150, 'tax' => 0, 'tax_type' => 'percent', 'discount' => 20, 'discount_type' => 'percent', 'restaurant_id' => 2, 'created_at' => now(), 'updated_at' => now()]
        ]);


    }
}
