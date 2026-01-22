<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderTransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_transactions')->truncate();

        DB::table('order_transactions')->insert([
            ['id' => 1, 'vendor_id' => 4, 'delivery_man_id' => null, 'order_id' => 100001, 'order_amount' => 244.8, 'restaurant_amount' => 220.8, 'admin_commission' => 24, 'received_by' => 'admin', 'status' => null, 'created_at' => now(), 'updated_at' => now(), 'delivery_charge' => 0, 'original_delivery_charge' => 4321.12, 'tax' => 4.8],
            ['id' => 2, 'vendor_id' => 2, 'delivery_man_id' => 1, 'order_id' => 100005, 'order_amount' => 1939.51, 'restaurant_amount' => 323, 'admin_commission' => 34, 'received_by' => 'deliveryman', 'status' => null, 'created_at' => now(), 'updated_at' => now(), 'delivery_charge' => 1582.51, 'original_delivery_charge' => 1582.51, 'tax' => 17],
            ['id' => 3, 'vendor_id' => 2, 'delivery_man_id' => null, 'order_id' => 100008, 'order_amount' => 357, 'restaurant_amount' => 323, 'admin_commission' => 34, 'received_by' => 'restaurant', 'status' => null, 'created_at' => now(), 'updated_at' => now(), 'delivery_charge' => 0, 'original_delivery_charge' => 1582.51, 'tax' => 17],
            ['id' => 4, 'vendor_id' => 2, 'delivery_man_id' => 2, 'order_id' => 100014, 'order_amount' => 260.93, 'restaurant_amount' => 236.08, 'admin_commission' => 24.85, 'received_by' => 'deliveryman', 'status' => null, 'created_at' => now(), 'updated_at' => now(), 'delivery_charge' => 0, 'original_delivery_charge' => 1582.52, 'tax' => 12.43],
            ['id' => 5, 'vendor_id' => 7, 'delivery_man_id' => null, 'order_id' => 100016, 'order_amount' => 4393.2, 'restaurant_amount' => 63, 'admin_commission' => 14, 'received_by' => 'admin', 'status' => null, 'created_at' => now(), 'updated_at' => now(), 'delivery_charge' => 4316.2, 'original_delivery_charge' => 4316.2, 'tax' => 7],
            ['id' => 6, 'vendor_id' => 7, 'delivery_man_id' => null, 'order_id' => 100017, 'order_amount' => 4390.45, 'restaurant_amount' => 60.75, 'admin_commission' => 13.5, 'received_by' => 'admin', 'status' => null, 'created_at' => now(), 'updated_at' => now(), 'delivery_charge' => 4316.2, 'original_delivery_charge' => 4316.2, 'tax' => 6.75],
            ['id' => 7, 'vendor_id' => 1, 'delivery_man_id' => null, 'order_id' => 100021, 'order_amount' => 5250.37, 'restaurant_amount' => 685, 'admin_commission' => 68.5, 'received_by' => 'admin', 'status' => null, 'created_at' => now(), 'updated_at' => now(), 'delivery_charge' => 4496.87, 'original_delivery_charge' => 4496.87, 'tax' => 68.5],
            ['id' => 8, 'vendor_id' => 11, 'delivery_man_id' => 4, 'order_id' => 100023, 'order_amount' => 878.4, 'restaurant_amount' => 110.81, 'admin_commission' => 10.86, 'received_by' => 'deliveryman', 'status' => null, 'created_at' => now(), 'updated_at' => now(), 'delivery_charge' => 756.73, 'original_delivery_charge' => 756.73, 'tax' => 13.04],
            ['id' => 9, 'vendor_id' => 7, 'delivery_man_id' => 4, 'order_id' => 100032, 'order_amount' => 4655.68, 'restaurant_amount' => 288, 'admin_commission' => 64, 'received_by' => 'deliveryman', 'status' => null, 'created_at' => now(), 'updated_at' => now(), 'delivery_charge' => 4303.68, 'original_delivery_charge' => 4303.68, 'tax' => 32],
            ['id' => 10, 'vendor_id' => 2, 'delivery_man_id' => 7, 'order_id' => 100037, 'order_amount' => 99.75, 'restaurant_amount' => 90.25, 'admin_commission' => 9.5, 'received_by' => 'deliveryman', 'status' => null, 'created_at' => now(), 'updated_at' => now(), 'delivery_charge' => 0, 'original_delivery_charge' => 14171.77, 'tax' => 4.75],
            ['id' => 11, 'vendor_id' => 2, 'delivery_man_id' => 2, 'order_id' => 100033, 'order_amount' => 99.75, 'restaurant_amount' => 90.25, 'admin_commission' => 9.5, 'received_by' => 'deliveryman', 'status' => null, 'created_at' => now(), 'updated_at' => now(), 'delivery_charge' => 0, 'original_delivery_charge' => 1584.34, 'tax' => 4.75],
            ['id' => 12, 'vendor_id' => 2, 'delivery_man_id' => null, 'order_id' => 100046, 'order_amount' => 357, 'restaurant_amount' => 323, 'admin_commission' => 34, 'received_by' => 'restaurant', 'status' => null, 'created_at' => now(), 'updated_at' => now(), 'delivery_charge' => 0, 'original_delivery_charge' => 12143, 'tax' => 17],
            ['id' => 13, 'vendor_id' => 2, 'delivery_man_id' => null, 'order_id' => 100028, 'order_amount' => 142.8, 'restaurant_amount' => 129.2, 'admin_commission' => 13.6, 'received_by' => 'restaurant', 'status' => null, 'created_at' => now(), 'updated_at' => now(), 'delivery_charge' => 0, 'original_delivery_charge' => 1575.93, 'tax' => 6.8],
            ['id' => 14, 'vendor_id' => 2, 'delivery_man_id' => null, 'order_id' => 100010, 'order_amount' => 276.68, 'restaurant_amount' => 250.33, 'admin_commission' => 26.35, 'received_by' => 'restaurant', 'status' => null, 'created_at' => now(), 'updated_at' => now(), 'delivery_charge' => 0, 'original_delivery_charge' => 1582.51, 'tax' => 13.18],
            ['id' => 15, 'vendor_id' => 11, 'delivery_man_id' => 2, 'order_id' => 100045, 'order_amount' => 904.62, 'restaurant_amount' => 257.04, 'admin_commission' => 25.2, 'received_by' => 'admin', 'status' => null, 'created_at' => now(), 'updated_at' => now(), 'delivery_charge' => 622.38, 'original_delivery_charge' => 622.38, 'tax' => 30.24],
            ['id' => 16, 'vendor_id' => 2, 'delivery_man_id' => 1, 'order_id' => 100066, 'order_amount' => 99.75, 'restaurant_amount' => 90.25, 'admin_commission' => 9.5, 'received_by' => 'deliveryman', 'status' => null, 'created_at' => now(), 'updated_at' => now(), 'delivery_charge' => 0, 'original_delivery_charge' => 1341.16, 'tax' => 4.75],
            ['id' => 17, 'vendor_id' => 2, 'delivery_man_id' => 9, 'order_id' => 100067, 'order_amount' => 99.75, 'restaurant_amount' => 90.25, 'admin_commission' => 9.5, 'received_by' => 'restaurant', 'status' => null, 'created_at' => now(), 'updated_at' => now(), 'delivery_charge' => 0, 'original_delivery_charge' => 1341.16, 'tax' => 4.75],
            ['id' => 18, 'vendor_id' => 11, 'delivery_man_id' => null, 'order_id' => 100071, 'order_amount' => 1967.1, 'restaurant_amount' => 122.4, 'admin_commission' => 12, 'received_by' => 'admin', 'status' => null, 'created_at' => now(), 'updated_at' => now(), 'delivery_charge' => 1832.7, 'original_delivery_charge' => 1832.7, 'tax' => 14.4],
            ['id' => 19, 'vendor_id' => 10, 'delivery_man_id' => 5, 'order_id' => 100072, 'order_amount' => 3718.45, 'restaurant_amount' => 233.75, 'admin_commission' => 68.75, 'received_by' => 'deliveryman', 'status' => null, 'created_at' => now(), 'updated_at' => now(), 'delivery_charge' => 3415.95, 'original_delivery_charge' => 3415.95, 'tax' => 27.5]
        ]);


    }
}
