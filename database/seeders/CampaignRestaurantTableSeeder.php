<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CampaignRestaurantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campaign_restaurant')->truncate();

        DB::table('campaign_restaurant')->insert([
            ['campaign_id' => 1, 'restaurant_id' => 1],
            ['campaign_id' => 1, 'restaurant_id' => 3],
            ['campaign_id' => 1, 'restaurant_id' => 6]
        ]);


    }
}
