<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->truncate();

        DB::table('admins')->insert([
            ['id' => 1, 'f_name' => 'Jhon', 'l_name' => 'Doe', 'phone' => 1700000000, 'email' => 'admin@admin.com', 'image' => '2021-08-22-61214c4e9e0cb.png', 'password' => '$2a$12$NQBXTu9.U.jS0McEJPVEZuVcC2eAorHB8vQXCPlbcXuJM/mb9RpfO', 'remember_token' => 'LM8Ti4yhDa6CjoEVtNVAvtVb366OR4PQT5hsP0uS54RXleKuaqPhZpAqmJlf', 'created_at' => now(), 'updated_at' => now(), 'role_id' => 1, 'zone_id' => null]
        ]);


    }
}
