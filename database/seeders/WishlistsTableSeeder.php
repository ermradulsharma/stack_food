<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WishlistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wishlists')->truncate();

        DB::table('wishlists')->insert([
            ['id' => 2, 'user_id' => 3, 'food_id' => 1, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => null],
            ['id' => 3, 'user_id' => 3, 'food_id' => 3, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => null],
            ['id' => 4, 'user_id' => 3, 'food_id' => 4, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => null],
            ['id' => 5, 'user_id' => 3, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 1],
            ['id' => 6, 'user_id' => 3, 'food_id' => 21, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => null],
            ['id' => 7, 'user_id' => 3, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 2],
            ['id' => 8, 'user_id' => 3, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 4],
            ['id' => 9, 'user_id' => 6, 'food_id' => 3, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => null],
            ['id' => 10, 'user_id' => 6, 'food_id' => 69, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => null],
            ['id' => 11, 'user_id' => 6, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 3],
            ['id' => 12, 'user_id' => 6, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 4],
            ['id' => 13, 'user_id' => 8, 'food_id' => 93, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => null],
            ['id' => 14, 'user_id' => 9, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 1],
            ['id' => 15, 'user_id' => 9, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 2],
            ['id' => 16, 'user_id' => 10, 'food_id' => 74, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => null],
            ['id' => 17, 'user_id' => 10, 'food_id' => 65, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => null],
            ['id' => 19, 'user_id' => 10, 'food_id' => 60, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => null],
            ['id' => 20, 'user_id' => 10, 'food_id' => 63, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => null],
            ['id' => 21, 'user_id' => 12, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 1],
            ['id' => 22, 'user_id' => 12, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 2],
            ['id' => 23, 'user_id' => 12, 'food_id' => 3, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => null],
            ['id' => 24, 'user_id' => 12, 'food_id' => 1, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => null],
            ['id' => 25, 'user_id' => 9, 'food_id' => 121, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => null],
            ['id' => 26, 'user_id' => 13, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 7],
            ['id' => 27, 'user_id' => 13, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 8],
            ['id' => 28, 'user_id' => 13, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 9],
            ['id' => 29, 'user_id' => 13, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 11],
            ['id' => 30, 'user_id' => 13, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 12],
            ['id' => 31, 'user_id' => 13, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 13],
            ['id' => 32, 'user_id' => 4, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 8],
            ['id' => 33, 'user_id' => 4, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 6],
            ['id' => 34, 'user_id' => 4, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 4],
            ['id' => 35, 'user_id' => 4, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 1],
            ['id' => 36, 'user_id' => 4, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 2],
            ['id' => 37, 'user_id' => 4, 'food_id' => 121, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => null],
            ['id' => 38, 'user_id' => 4, 'food_id' => 97, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => null],
            ['id' => 39, 'user_id' => 14, 'food_id' => 23, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => null],
            ['id' => 40, 'user_id' => 9, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 4],
            ['id' => 42, 'user_id' => 24, 'food_id' => 109, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => null],
            ['id' => 43, 'user_id' => 24, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 1],
            ['id' => 44, 'user_id' => 27, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 2],
            ['id' => 45, 'user_id' => 27, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 1],
            ['id' => 47, 'user_id' => 27, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 4],
            ['id' => 48, 'user_id' => 29, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 14],
            ['id' => 49, 'user_id' => 29, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 13],
            ['id' => 50, 'user_id' => 29, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 12],
            ['id' => 51, 'user_id' => 29, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 11],
            ['id' => 53, 'user_id' => 28, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 7],
            ['id' => 54, 'user_id' => 28, 'food_id' => null, 'created_at' => now(), 'updated_at' => now(), 'restaurant_id' => 11]
        ]);


    }
}
