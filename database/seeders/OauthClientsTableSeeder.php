<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OauthClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oauth_clients')->truncate();

        DB::table('oauth_clients')->insert([
            ['id' => 1, 'user_id' => null, 'name' => 'Laravel Personal Access Client', 'secret' => 'qBN0j6SW6nIf47748tgxaKxnqKqCacTxa6gii8yc', 'provider' => null, 'redirect' => 'http://localhost', 'personal_access_client' => 1, 'password_client' => 0, 'revoked' => 0, 'created_at' => now(), 'updated_at' => now()]
        ]);


    }
}
