<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantWalletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('restaurant_wallets')->truncate();

        DB::table('restaurant_wallets')->insert([
            ['id' => 1, 'vendor_id' => 1, 'total_earning' => 685, 'total_withdrawn' => 0, 'pending_withdraw' => 0, 'collected_cash' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'vendor_id' => 6, 'total_earning' => 0, 'total_withdrawn' => 0, 'pending_withdraw' => 0, 'collected_cash' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'vendor_id' => 2, 'total_earning' => 1945.61, 'total_withdrawn' => 0, 'pending_withdraw' => 0, 'collected_cash' => 1233.23, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'vendor_id' => 5, 'total_earning' => 0, 'total_withdrawn' => 0, 'pending_withdraw' => 0, 'collected_cash' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'vendor_id' => 4, 'total_earning' => 220.8, 'total_withdrawn' => 0, 'pending_withdraw' => 0, 'collected_cash' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'vendor_id' => 3, 'total_earning' => 0, 'total_withdrawn' => 0, 'pending_withdraw' => 0, 'collected_cash' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'vendor_id' => 7, 'total_earning' => 411.75, 'total_withdrawn' => 0, 'pending_withdraw' => 0, 'collected_cash' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'vendor_id' => 8, 'total_earning' => 0, 'total_withdrawn' => 0, 'pending_withdraw' => 0, 'collected_cash' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'vendor_id' => 9, 'total_earning' => 0, 'total_withdrawn' => 0, 'pending_withdraw' => 0, 'collected_cash' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'vendor_id' => 10, 'total_earning' => 4594.25, 'total_withdrawn' => 0, 'pending_withdraw' => 0, 'collected_cash' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'vendor_id' => 11, 'total_earning' => 490.25, 'total_withdrawn' => 0, 'pending_withdraw' => 0, 'collected_cash' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'vendor_id' => 12, 'total_earning' => 0, 'total_withdrawn' => 0, 'pending_withdraw' => 0, 'collected_cash' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 13, 'vendor_id' => 13, 'total_earning' => 0, 'total_withdrawn' => 0, 'pending_withdraw' => 0, 'collected_cash' => 0, 'created_at' => now(), 'updated_at' => now()],
            ['id' => 14, 'vendor_id' => 14, 'total_earning' => 0, 'total_withdrawn' => 0, 'pending_withdraw' => 0, 'collected_cash' => 0, 'created_at' => now(), 'updated_at' => now()]
        ]);


    }
}
