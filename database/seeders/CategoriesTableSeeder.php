<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        DB::table('categories')->insert([
            ['id' => 5, 'name' => 'Burger', 'image' => '2021-08-20-611fbe0e334c5.png', 'parent_id' => 0, 'position' => 0, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 6, 'name' => 'Biriyani', 'image' => '2021-08-20-611fbeadbf729.png', 'parent_id' => 0, 'position' => 0, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 7, 'name' => 'Asian', 'image' => '2021-08-20-611fbebbc8db2.png', 'parent_id' => 0, 'position' => 0, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 8, 'name' => 'Cake', 'image' => '2021-08-20-611fbecb2b870.png', 'parent_id' => 0, 'position' => 0, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 9, 'name' => 'Coffee & Drinks', 'image' => '2021-08-20-611fbede98fba.png', 'parent_id' => 0, 'position' => 0, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 10, 'name' => 'Chinese', 'image' => '2021-08-20-611fbf1b426e1.png', 'parent_id' => 0, 'position' => 0, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 11, 'name' => 'Fast Food', 'image' => '2021-08-20-611fbf30f1a68.png', 'parent_id' => 0, 'position' => 0, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 12, 'name' => 'Kabab & More', 'image' => '2021-08-20-611fbf491f625.png', 'parent_id' => 0, 'position' => 0, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 13, 'name' => 'Indian', 'image' => '2021-08-20-611fbf6a9a159.png', 'parent_id' => 0, 'position' => 0, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 14, 'name' => 'Noodles', 'image' => '2021-08-20-611fbf779aef1.png', 'parent_id' => 0, 'position' => 0, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 15, 'name' => 'Mexican Food', 'image' => '2021-08-20-611fbf96910eb.png', 'parent_id' => 0, 'position' => 0, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 16, 'name' => 'Pasta', 'image' => '2021-08-20-611fbfa397c7c.png', 'parent_id' => 0, 'position' => 0, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 17, 'name' => 'Pizza', 'image' => '2021-08-20-611fbfb0af526.png', 'parent_id' => 0, 'position' => 0, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 18, 'name' => 'Snacks', 'image' => '2021-08-20-611fbfbc0e2ed.png', 'parent_id' => 0, 'position' => 0, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 19, 'name' => 'Thai', 'image' => '2021-08-20-611fbfc6ac515.png', 'parent_id' => 0, 'position' => 0, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 20, 'name' => 'Varieties', 'image' => '2021-08-20-611fbfd13f7db.png', 'parent_id' => 0, 'position' => 0, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 24, 'name' => 'Kubie Burger', 'image' => 'def.png', 'parent_id' => 5, 'position' => 1, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 25, 'name' => 'Steamed Cheese', 'image' => 'def.png', 'parent_id' => 5, 'position' => 1, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 26, 'name' => 'Theta Burger', 'image' => 'def.png', 'parent_id' => 5, 'position' => 1, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 27, 'name' => 'Nutburger', 'image' => 'def.png', 'parent_id' => 5, 'position' => 1, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 28, 'name' => 'Pimento Cheese', 'image' => 'def.png', 'parent_id' => 5, 'position' => 1, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 29, 'name' => 'Pound Cake', 'image' => 'def.png', 'parent_id' => 8, 'position' => 1, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 30, 'name' => 'Yellow Butter', 'image' => 'def.png', 'parent_id' => 8, 'position' => 1, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 31, 'name' => 'Red Velvet', 'image' => 'def.png', 'parent_id' => 8, 'position' => 1, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 32, 'name' => 'Black Coffee', 'image' => 'def.png', 'parent_id' => 9, 'position' => 1, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 33, 'name' => 'Robusta', 'image' => 'def.png', 'parent_id' => 9, 'position' => 1, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 34, 'name' => 'Cappuccino', 'image' => 'def.png', 'parent_id' => 9, 'position' => 1, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 35, 'name' => 'Macchiato', 'image' => 'def.png', 'parent_id' => 9, 'position' => 1, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 36, 'name' => 'Soft Drinks', 'image' => 'def.png', 'parent_id' => 9, 'position' => 1, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0],
            ['id' => 37, 'name' => 'Food', 'image' => '2021-12-05-61acb51584a1f.png', 'parent_id' => 0, 'position' => 0, 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'priority' => 0]
        ]);


    }
}
