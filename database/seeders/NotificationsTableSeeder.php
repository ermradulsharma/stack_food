<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notifications')->truncate();

        DB::table('notifications')->insert([
            ['id' => 1, 'title' => 'Test Notification', 'description' => 'This is a test notification', 'image' => '2021-08-21-6121064109929.png', 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'tergat' => 'deliveryman', 'zone_id' => null],
            ['id' => 2, 'title' => 'Test Notification', 'description' => 'This is a test notification to all zone', 'image' => null, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'tergat' => 'deliveryman', 'zone_id' => null],
            ['id' => 3, 'title' => 'Test Notification', 'description' => 'This is a test notification to a zone', 'image' => '2021-08-21-612106a7aefd7.png', 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'tergat' => 'deliveryman', 'zone_id' => 1],
            ['id' => 4, 'title' => 'Test Notification', 'description' => 'This is test notification sent to all zone', 'image' => null, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'tergat' => 'customer', 'zone_id' => null],
            ['id' => 5, 'title' => 'Test Notification', 'description' => 'This is test notification sent to a zone', 'image' => null, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'tergat' => 'customer', 'zone_id' => 1],
            ['id' => 6, 'title' => 'Test Notification', 'description' => 'This is test notification', 'image' => null, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'tergat' => 'customer', 'zone_id' => null],
            ['id' => 7, 'title' => 'Test Notification', 'description' => 'Test notify', 'image' => null, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'tergat' => 'customer', 'zone_id' => null],
            ['id' => 8, 'title' => 'Test Notification', 'description' => 'jhvbhjbhjn', 'image' => null, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'tergat' => 'customer', 'zone_id' => null],
            ['id' => 9, 'title' => 'Hey There', 'description' => 'Hello', 'image' => null, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'tergat' => 'deliveryman', 'zone_id' => null],
            ['id' => 10, 'title' => 'Test Notification', 'description' => 'Hi', 'image' => null, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'tergat' => 'deliveryman', 'zone_id' => null],
            ['id' => 11, 'title' => 'Test by Sakeef', 'description' => 'Test', 'image' => null, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'tergat' => 'customer', 'zone_id' => null],
            ['id' => 12, 'title' => 'Test', 'description' => 'hfgf', 'image' => null, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'tergat' => 'customer', 'zone_id' => null],
            ['id' => 13, 'title' => 'kjjb', 'description' => 'bhbh', 'image' => null, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'tergat' => 'customer', 'zone_id' => 1],
            ['id' => 14, 'title' => 'Test', 'description' => 'jhghgv', 'image' => null, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'tergat' => 'customer', 'zone_id' => null],
            ['id' => 15, 'title' => 'jhhv', 'description' => 'jhhvh', 'image' => null, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'tergat' => 'customer', 'zone_id' => null],
            ['id' => 16, 'title' => 'Test by Sakeef', 'description' => 'test', 'image' => null, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'tergat' => 'customer', 'zone_id' => null],
            ['id' => 17, 'title' => 'Test', 'description' => 'yfyfghfhg', 'image' => null, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'tergat' => 'customer', 'zone_id' => null],
            ['id' => 18, 'title' => 'Test by Sakeef', 'description' => 'test', 'image' => null, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'tergat' => 'customer', 'zone_id' => null],
            ['id' => 19, 'title' => 'Test', 'description' => 'hgfghvgh', 'image' => null, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'tergat' => 'deliveryman', 'zone_id' => null]
        ]);


    }
}
