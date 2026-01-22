<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('business_settings')->truncate();

        DB::table('business_settings')->insert([
            ['id' => 1, 'key' => 'cash_on_delivery', 'value' => '{\\\"status\\\":\\\"1\\\"}', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'key' => 'stripe', 'value' => '{\\\"status\\\":\\\"1\\\",\\\"api_key\\\":\\\"sk_test_4eC39HqLyjWDarjtT1zdp7dc\\\",\\\"published_key\\\":\\\"pk_test_TYooMQauvdEDq54NiTphI7jx\\\"}', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'key' => 'mail_config', 'value' => '{\\\"name\\\":\\\"Efood multivendor\\\",\\\"host\\\":\\\"mail.6amtech.com\\\",\\\"driver\\\":\\\"smtp\\\",\\\"port\\\":\\\"587\\\",\\\"username\\\":\\\"info@6amtech.com\\\",\\\"email_id\\\":\\\"info@6amtech.com\\\",\\\"encryption\\\":\\\"tls\\\",\\\"password\\\":\\\"K@Yb.3+r1BVs\\\"}', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'key' => 'fcm_project_id', 'value' => 'e-food-9e6e3', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'key' => 'push_notification_key', 'value' => 'AAAA9Gb8H_I:APA91bHgVLGopGJibQIPZHcLT8JJz_UbryesnRE6rz4rqs6McQyCZ2A9LcdnclZd_3CqdwPcaxaEUphO42OJB_-JdK0_JLopXCo8Ubl2ABMql_BCysLoCj4k-iIOYXd3_dYIvuB8cEee', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'key' => 'order_pending_message', 'value' => '{\\\"status\\\":1,\\\"message\\\":\\\"Your order is successfully placed\\\"}', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 8, 'key' => 'order_confirmation_msg', 'value' => '{\\\"status\\\":1,\\\"message\\\":\\\"Your order is confirmed\\\"}', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 9, 'key' => 'order_processing_message', 'value' => '{\\\"status\\\":1,\\\"message\\\":\\\"Your order is started for cooking\\\"}', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 10, 'key' => 'out_for_delivery_message', 'value' => '{\\\"status\\\":1,\\\"message\\\":\\\"Your food is ready for delivery\\\"}', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 11, 'key' => 'order_delivered_message', 'value' => '{\\\"status\\\":1,\\\"message\\\":\\\"Your order is delivered\\\"}', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 12, 'key' => 'delivery_boy_assign_message', 'value' => '{\\\"status\\\":1,\\\"message\\\":\\\"Your order has been assigned to a delivery man\\\"}', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 13, 'key' => 'delivery_boy_start_message', 'value' => '{\\\"status\\\":1,\\\"message\\\":\\\"Your order is picked up by delivery man\\\"}', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 14, 'key' => 'delivery_boy_delivered_message', 'value' => '{\\\"status\\\":1,\\\"message\\\":\\\"Order delivered successfully\\\"}', 'created_at' => now(), 'updated_at' => now()]
        ]);


    }
}
