<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryManWalletsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery_man_wallets')->truncate();

        DB::table('delivery_man_wallets')->insert([
            ['id' => 1, 'delivery_man_id' => 1, 'collected_cash' => 2039.26, 'created_at' => now(), 'updated_at' => now(), 'total_earning' => 4506.18, 'total_withdrawn' => 0, 'pending_withdraw' => 0],
            ['id' => 2, 'delivery_man_id' => 2, 'collected_cash' => 360.68, 'created_at' => now(), 'updated_at' => now(), 'total_earning' => 0, 'total_withdrawn' => 0, 'pending_withdraw' => 0],
            ['id' => 3, 'delivery_man_id' => 4, 'collected_cash' => 5534.08, 'created_at' => now(), 'updated_at' => now(), 'total_earning' => 5817.14, 'total_withdrawn' => 0, 'pending_withdraw' => 0],
            ['id' => 4, 'delivery_man_id' => 7, 'collected_cash' => 99.75, 'created_at' => now(), 'updated_at' => now(), 'total_earning' => 14171.77, 'total_withdrawn' => 0, 'pending_withdraw' => 0]
        ]);


    }
}
