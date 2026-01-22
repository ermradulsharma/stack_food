<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddOnsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('add_ons')->truncate();

        DB::table('add_ons')->insert([
            ['id' => 1, 'name' => 'Cheese', 'price' => 10, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 1, 'status' => 1],
            ['id' => 2, 'name' => 'Cheese', 'price' => 15, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 2, 'status' => 1],
            ['id' => 3, 'name' => 'Cheese', 'price' => 15, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 9, 'status' => 1],
            ['id' => 4, 'name' => 'Coke', 'price' => 10, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 9, 'status' => 1],
            ['id' => 5, 'name' => 'Extra Spice', 'price' => 5, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 9, 'status' => 1],
            ['id' => 6, 'name' => 'Cheese', 'price' => 10, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 14, 'status' => 1],
            ['id' => 7, 'name' => 'Extra Spice', 'price' => 5, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 14, 'status' => 1],
            ['id' => 8, 'name' => 'Extra Chicken', 'price' => 15, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 14, 'status' => 1],
            ['id' => 9, 'name' => 'Extra Beef', 'price' => 50, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 14, 'status' => 1],
            ['id' => 10, 'name' => 'SALAD', 'price' => 10, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 14, 'status' => 1],
            ['id' => 11, 'name' => 'Sauce', 'price' => 5, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 14, 'status' => 1],
            ['id' => 12, 'name' => 'salad', 'price' => 10, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 1, 'status' => 1],
            ['id' => 13, 'name' => 'extra beef', 'price' => 40, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 1, 'status' => 1],
            ['id' => 14, 'name' => 'extra chicken', 'price' => 30, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 1, 'status' => 1],
            ['id' => 15, 'name' => 'sauce', 'price' => 5, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 1, 'status' => 1],
            ['id' => 16, 'name' => 'Coke', 'price' => 15, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 13, 'status' => 1],
            ['id' => 17, 'name' => 'Pepsi', 'price' => 18, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 13, 'status' => 1],
            ['id' => 18, 'name' => 'Extra Cheese', 'price' => 19, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 13, 'status' => 1],
            ['id' => 19, 'name' => 'Extra Chicken', 'price' => 14, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 13, 'status' => 1],
            ['id' => 20, 'name' => 'Extra Meat', 'price' => 18, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 13, 'status' => 1],
            ['id' => 21, 'name' => 'Sauce', 'price' => 5, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 8, 'status' => 1],
            ['id' => 22, 'name' => 'Extra Chicken', 'price' => 39, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 8, 'status' => 1],
            ['id' => 23, 'name' => 'Extra Beef', 'price' => 50, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 8, 'status' => 1],
            ['id' => 24, 'name' => 'salad', 'price' => 10, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 8, 'status' => 1],
            ['id' => 25, 'name' => 'Coke', 'price' => 15, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 14, 'status' => 1],
            ['id' => 26, 'name' => 'Pepsi', 'price' => 18, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 14, 'status' => 1],
            ['id' => 27, 'name' => 'Tomato Sauce', 'price' => 10, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 10, 'status' => 1],
            ['id' => 28, 'name' => 'Hot Sauce', 'price' => 12, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 10, 'status' => 1],
            ['id' => 29, 'name' => 'Taco Sauce', 'price' => 11, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 10, 'status' => 1],
            ['id' => 30, 'name' => 'Coke', 'price' => 12, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 2, 'status' => 1],
            ['id' => 31, 'name' => 'Pepsi', 'price' => 18, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 2, 'status' => 1],
            ['id' => 32, 'name' => 'Sauce', 'price' => 11, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 2, 'status' => 1],
            ['id' => 33, 'name' => 'Extra Spice', 'price' => 9, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 2, 'status' => 1],
            ['id' => 34, 'name' => 'Extra Meat', 'price' => 14, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 2, 'status' => 1],
            ['id' => 35, 'name' => 'Extra Chicken', 'price' => 12, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 2, 'status' => 1],
            ['id' => 36, 'name' => 'Tomato Sauce', 'price' => 10, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 6, 'status' => 1],
            ['id' => 37, 'name' => 'Hot Sauce', 'price' => 12, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 6, 'status' => 1],
            ['id' => 38, 'name' => 'Soft Drinks', 'price' => 20, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 6, 'status' => 1],
            ['id' => 39, 'name' => 'Tomato Sauce', 'price' => 10, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 3, 'status' => 1]
        ]);


    }
}
