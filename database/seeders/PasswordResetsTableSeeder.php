<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PasswordResetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('password_resets')->truncate();

        DB::table('password_resets')->insert([
            ['email' => 'demo@inboxgun.com', 'token' => 4320, 'created_at' => now()]
        ]);


    }
}
