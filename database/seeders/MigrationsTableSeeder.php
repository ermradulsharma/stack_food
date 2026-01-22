<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MigrationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('migrations')->truncate();

        DB::table('migrations')->insert([
            ['id' => 1, 'migration' => '2014_10_12_000000_create_users_table', 'batch' => 1],
            ['id' => 2, 'migration' => '2014_10_12_100000_create_password_resets_table', 'batch' => 1],
            ['id' => 3, 'migration' => '2019_08_19_000000_create_failed_jobs_table', 'batch' => 1],
            ['id' => 4, 'migration' => '2021_05_05_081114_create_admins_table', 'batch' => 1],
            ['id' => 5, 'migration' => '2021_05_05_102600_create_attributes_table', 'batch' => 1],
            ['id' => 6, 'migration' => '2021_05_05_102742_create_categories_table', 'batch' => 1],
            ['id' => 7, 'migration' => '2021_05_06_102004_create_vendors_table', 'batch' => 1],
            ['id' => 8, 'migration' => '2021_05_06_153204_create_restaurants_table', 'batch' => 1],
            ['id' => 9, 'migration' => '2021_05_08_113436_create_add_ons_table', 'batch' => 2],
            ['id' => 47, 'migration' => '2021_05_08_123446_create_food_table', 'batch' => 10],
            ['id' => 48, 'migration' => '2021_05_08_141209_create_currencies_table', 'batch' => 10],
            ['id' => 49, 'migration' => '2021_05_09_050232_create_orders_table', 'batch' => 10],
            ['id' => 50, 'migration' => '2021_05_09_051907_create_reviews_table', 'batch' => 10],
            ['id' => 51, 'migration' => '2021_05_09_054237_create_order_details_table', 'batch' => 10],
            ['id' => 52, 'migration' => '2021_05_10_105324_create_mail_configs_table', 'batch' => 10],
            ['id' => 53, 'migration' => '2021_05_10_152713_create_business_settings_table', 'batch' => 10],
            ['id' => 54, 'migration' => '2021_05_11_111722_create_banners_table', 'batch' => 11],
            ['id' => 55, 'migration' => '2021_05_11_134442_create_coupons_table', 'batch' => 11],
            ['id' => 56, 'migration' => '2021_05_12_053344_create_conversations_table', 'batch' => 11],
            ['id' => 57, 'migration' => '2021_05_12_055454_create_delivery_men_table', 'batch' => 12],
            ['id' => 58, 'migration' => '2021_05_12_060138_create_d_m_reviews_table', 'batch' => 12],
            ['id' => 59, 'migration' => '2021_05_12_060527_create_track_deliverymen_table', 'batch' => 12],
            ['id' => 60, 'migration' => '2021_05_12_061345_create_email_verifications_table', 'batch' => 12],
            ['id' => 61, 'migration' => '2021_05_12_061454_create_delivery_histories_table', 'batch' => 12],
            ['id' => 62, 'migration' => '2021_05_12_061718_create_wishlists_table', 'batch' => 12],
            ['id' => 63, 'migration' => '2021_05_12_061924_create_notifications_table', 'batch' => 12],
            ['id' => 64, 'migration' => '2021_05_12_062152_create_customer_addresses_table', 'batch' => 12],
            ['id' => 68, 'migration' => '2021_05_12_062412_create_order_delivery_histories_table', 'batch' => 13],
            ['id' => 69, 'migration' => '2021_05_19_115112_create_zones_table', 'batch' => 13],
            ['id' => 70, 'migration' => '2021_05_19_120612_create_restaurant_zone_table', 'batch' => 13],
            ['id' => 71, 'migration' => '2021_06_07_103835_add_column_to_vendor_table', 'batch' => 14],
            ['id' => 73, 'migration' => '2021_06_07_112335_add_column_to_vendors_table', 'batch' => 15],
            ['id' => 74, 'migration' => '2021_06_08_162354_add_column_to_restaurants_table', 'batch' => 16],
            ['id' => 77, 'migration' => '2021_06_09_115719_add_column_to_add_ons_table', 'batch' => 17],
            ['id' => 78, 'migration' => '2021_06_10_091547_add_column_to_coupons_table', 'batch' => 18],
            ['id' => 79, 'migration' => '2021_06_12_070530_rename_banners_table', 'batch' => 19],
            ['id' => 80, 'migration' => '2021_06_12_091154_add_column_on_campaigns_table', 'batch' => 20],
            ['id' => 87, 'migration' => '2021_06_12_091848_create_item_campaigns_table', 'batch' => 21],
            ['id' => 92, 'migration' => '2021_06_13_155531_create_campaign_restaurant_table', 'batch' => 22],
            ['id' => 93, 'migration' => '2021_06_14_090520_add_item_campaign_id_column_to_reviews_table', 'batch' => 23],
            ['id' => 94, 'migration' => '2021_06_14_091735_add_item_campaign_id_column_to_order_details_table', 'batch' => 24],
            ['id' => 95, 'migration' => '2021_06_14_120713_create_new_banners_table', 'batch' => 25],
            ['id' => 96, 'migration' => '2021_06_15_103656_add_zone_id_column_to_banners_table', 'batch' => 26],
            ['id' => 97, 'migration' => '2021_06_16_110322_create_discounts_table', 'batch' => 27],
            ['id' => 100, 'migration' => '2021_06_17_150243_create_withdraw_requests_table', 'batch' => 28],
            ['id' => 103, 'migration' => '2016_06_01_000001_create_oauth_auth_codes_table', 'batch' => 30],
            ['id' => 104, 'migration' => '2016_06_01_000002_create_oauth_access_tokens_table', 'batch' => 30],
            ['id' => 105, 'migration' => '2016_06_01_000003_create_oauth_refresh_tokens_table', 'batch' => 30],
            ['id' => 106, 'migration' => '2016_06_01_000004_create_oauth_clients_table', 'batch' => 30],
            ['id' => 107, 'migration' => '2016_06_01_000005_create_oauth_personal_access_clients_table', 'batch' => 30]
        ]);

        DB::table('migrations')->insert([
            ['id' => 108, 'migration' => '2021_06_21_051135_add_delivery_charge_to_orders_table', 'batch' => 31],
            ['id' => 110, 'migration' => '2021_06_23_080009_add_role_id_to_admins_table', 'batch' => 32],
            ['id' => 111, 'migration' => '2021_06_27_140224_add_interest_column_to_users_table', 'batch' => 33],
            ['id' => 113, 'migration' => '2021_06_27_142558_change_column_to_restaurants_table', 'batch' => 34],
            ['id' => 114, 'migration' => '2021_06_27_152139_add_restaurant_id_column_to_wishlists_table', 'batch' => 35],
            ['id' => 115, 'migration' => '2021_06_28_142443_add_restaurant_id_column_to_customer_addresses_table', 'batch' => 36],
            ['id' => 118, 'migration' => '2021_06_29_134119_add_schedule_column_to_orders_table', 'batch' => 37],
            ['id' => 122, 'migration' => '2021_06_30_084854_add_cm_firebase_token_column_to_users_table', 'batch' => 38],
            ['id' => 123, 'migration' => '2021_06_30_133932_add_code_column_to_coupons_table', 'batch' => 39],
            ['id' => 127, 'migration' => '2021_07_01_151103_change_column_food_id_from_admin_wallet_histories_table', 'batch' => 40],
            ['id' => 129, 'migration' => '2021_07_04_142159_add_callback_column_to_orders_table', 'batch' => 41],
            ['id' => 131, 'migration' => '2021_07_05_155506_add_cm_firebase_token_to_vendors_table', 'batch' => 42],
            ['id' => 133, 'migration' => '2021_07_05_162404_add_otp_to_orders_table', 'batch' => 43],
            ['id' => 134, 'migration' => '2021_07_13_133941_create_admin_roles_table', 'batch' => 44],
            ['id' => 135, 'migration' => '2021_07_14_074431_add_status_to_delivery_men_table', 'batch' => 45],
            ['id' => 136, 'migration' => '2021_07_14_104102_create_vendor_employees_table', 'batch' => 46],
            ['id' => 137, 'migration' => '2021_07_14_110011_create_employee_roles_table', 'batch' => 46],
            ['id' => 138, 'migration' => '2021_07_15_124141_add_cover_photo_to_restaurants_table', 'batch' => 47],
            ['id' => 143, 'migration' => '2021_06_17_145949_create_wallets_table', 'batch' => 48],
            ['id' => 144, 'migration' => '2021_06_19_052600_create_admin_wallets_table', 'batch' => 48],
            ['id' => 145, 'migration' => '2021_07_19_103748_create_delivery_man_wallets_table', 'batch' => 48],
            ['id' => 146, 'migration' => '2021_07_19_105442_create_account_transactions_table', 'batch' => 48],
            ['id' => 147, 'migration' => '2021_07_19_110152_create_order_transactions_table', 'batch' => 48],
            ['id' => 148, 'migration' => '2021_07_19_134356_add_column_to_notifications_table', 'batch' => 49],
            ['id' => 149, 'migration' => '2021_07_25_125316_add_available_to_delivery_men_table', 'batch' => 50],
            ['id' => 150, 'migration' => '2021_07_25_154722_add_columns_to_restaurants_table', 'batch' => 51],
            ['id' => 151, 'migration' => '2021_07_29_162336_add_schedule_order_column_to_restaurants_table', 'batch' => 52],
            ['id' => 152, 'migration' => '2021_07_31_140756_create_phone_verifications_table', 'batch' => 53],
            ['id' => 153, 'migration' => '2021_08_01_151717_add_column_to_order_transactions_table', 'batch' => 54],
            ['id' => 154, 'migration' => '2021_08_01_163520_add_column_to_admin_wallets_table', 'batch' => 54],
            ['id' => 155, 'migration' => '2021_08_02_141909_change_time_column_to_restaurants_table', 'batch' => 55],
            ['id' => 157, 'migration' => '2021_08_02_183356_add_tax_column_to_restaurants_table', 'batch' => 56],
            ['id' => 158, 'migration' => '2021_08_04_215618_add_zone_id_column_to_restaurants_table', 'batch' => 57],
            ['id' => 159, 'migration' => '2021_08_06_123001_add_address_column_to_orders_table', 'batch' => 58],
            ['id' => 160, 'migration' => '2021_08_06_123326_add_zone_wise_topic_column_to_zones_table', 'batch' => 58],
            ['id' => 161, 'migration' => '2021_08_08_112127_add_scheduled_column_on_orders_table', 'batch' => 59],
            ['id' => 162, 'migration' => '2021_08_08_203108_add_status_column_to_users_table', 'batch' => 60],
            ['id' => 163, 'migration' => '2021_08_11_193805_add_product_discount_ammount_column_to_orders_table', 'batch' => 61],
            ['id' => 164, 'migration' => '2021_08_12_112511_add_addons_column_to_order_details_table', 'batch' => 62],
            ['id' => 165, 'migration' => '2021_08_12_195346_add_zone_id_to_notifications_table', 'batch' => 63],
            ['id' => 166, 'migration' => '2021_08_14_110131_create_user_notifications_table', 'batch' => 63],
            ['id' => 167, 'migration' => '2021_08_14_175657_add_order_count_column_to_foods_table', 'batch' => 64],
            ['id' => 168, 'migration' => '2021_08_14_180044_add_order_count_column_to_users_table', 'batch' => 64],
            ['id' => 169, 'migration' => '2021_08_19_051055_add_earnign_column_to_deliverymen_table', 'batch' => 65],
            ['id' => 170, 'migration' => '2021_08_19_051721_add_original_delivery_charge_column_to_orders_table', 'batch' => 65],
            ['id' => 171, 'migration' => '2021_08_19_055839_create_provide_d_m_earnings_table', 'batch' => 65],
            ['id' => 172, 'migration' => '2021_08_19_112810_add_original_delivery_charge_column_to_order_transactions_table', 'batch' => 65],
            ['id' => 173, 'migration' => '2021_08_19_114851_add_columns_to_delivery_man_wallets_table', 'batch' => 65],
            ['id' => 174, 'migration' => '2021_08_21_162616_change_comission_column_to_restaurants_table', 'batch' => 66],
            ['id' => 175, 'migration' => '2021_06_17_054551_create_soft_credentials_table', 'batch' => 67]
        ]);

        DB::table('migrations')->insert([
            ['id' => 176, 'migration' => '2021_08_22_232507_add_failed_column_to_orders_table', 'batch' => 67],
            ['id' => 177, 'migration' => '2021_09_04_172723_add_column_reviews_section_to_restaurants_table', 'batch' => 68],
            ['id' => 178, 'migration' => '2021_09_11_164936_change_delivery_address_column_to_orders_table', 'batch' => 68],
            ['id' => 179, 'migration' => '2021_09_11_165426_change_address_column_to_customer_addresses_table', 'batch' => 68],
            ['id' => 180, 'migration' => '2021_09_23_120332_change_available_column_to_delivery_men_table', 'batch' => 69],
            ['id' => 181, 'migration' => '2021_10_03_214536_add_active_column_to_restaurants_table', 'batch' => 70],
            ['id' => 182, 'migration' => '2021_10_04_123739_add_priority_column_to_categories_table', 'batch' => 70],
            ['id' => 183, 'migration' => '2021_10_06_200730_add_restaurant_id_column_to_demiverymen_table', 'batch' => 70],
            ['id' => 184, 'migration' => '2021_10_07_223332_add_self_delivery_column_to_restaurants_table', 'batch' => 70],
            ['id' => 185, 'migration' => '2021_10_11_214123_change_add_ons_column_to_order_details_table', 'batch' => 70],
            ['id' => 186, 'migration' => '2021_10_11_215352_add_adjustment_column_to_orders_table', 'batch' => 70],
            ['id' => 187, 'migration' => '2021_10_24_184553_change_column_to_account_transactions_table', 'batch' => 71],
            ['id' => 188, 'migration' => '2021_10_24_185143_change_column_to_add_ons_table', 'batch' => 71],
            ['id' => 189, 'migration' => '2021_10_24_185525_change_column_to_admin_roles_table', 'batch' => 71],
            ['id' => 190, 'migration' => '2021_10_24_185831_change_column_to_admin_wallets_table', 'batch' => 71],
            ['id' => 191, 'migration' => '2021_10_24_190550_change_column_to_coupons_table', 'batch' => 71],
            ['id' => 192, 'migration' => '2021_10_24_190826_change_column_to_delivery_man_wallets_table', 'batch' => 71],
            ['id' => 193, 'migration' => '2021_10_24_191018_change_column_to_discounts_table', 'batch' => 71],
            ['id' => 194, 'migration' => '2021_10_24_191209_change_column_to_employee_roles_table', 'batch' => 71],
            ['id' => 195, 'migration' => '2021_10_24_191343_change_column_to_food_table', 'batch' => 71],
            ['id' => 196, 'migration' => '2021_10_24_191514_change_column_to_item_campaigns_table', 'batch' => 71],
            ['id' => 197, 'migration' => '2021_10_24_191626_change_column_to_orders_table', 'batch' => 71],
            ['id' => 198, 'migration' => '2021_10_24_191938_change_column_to_order_details_table', 'batch' => 71],
            ['id' => 199, 'migration' => '2021_10_24_192341_change_column_to_order_transactions_table', 'batch' => 71],
            ['id' => 200, 'migration' => '2021_10_24_192621_change_column_to_provide_d_m_earnings_table', 'batch' => 71],
            ['id' => 201, 'migration' => '2021_10_24_192820_change_column_type_to_restaurants_table', 'batch' => 71],
            ['id' => 202, 'migration' => '2021_10_24_192959_change_column_type_to_restaurant_wallets_table', 'batch' => 71],
            ['id' => 203, 'migration' => '2021_11_02_123115_add_delivery_time_column_to_restaurants_table', 'batch' => 71],
            ['id' => 204, 'migration' => '2021_11_02_170217_add_total_uses_column_to_coupons_table', 'batch' => 71],
            ['id' => 205, 'migration' => '2021_12_01_131746_add_status_column_to_reviews_table', 'batch' => 72],
            ['id' => 206, 'migration' => '2021_12_01_135115_add_status_column_to_d_m_reviews_table', 'batch' => 72],
            ['id' => 207, 'migration' => '2021_12_13_125126_rename_comlumn_set_menu_to_food_table', 'batch' => 73],
            ['id' => 208, 'migration' => '2021_12_13_132438_add_zone_id_column_to_admins_table', 'batch' => 73],
            ['id' => 209, 'migration' => '2021_12_18_174714_add_application_status_column_to_delivery_men_table', 'batch' => 73],
            ['id' => 210, 'migration' => '2021_12_20_185736_change_status_column_to_vendors_table', 'batch' => 73],
            ['id' => 211, 'migration' => '2021_12_22_114414_create_translations_table', 'batch' => 73],
            ['id' => 212, 'migration' => '2022_01_05_133920_add_sosial_data_column_to_users_table', 'batch' => 73],
            ['id' => 213, 'migration' => '2022_01_05_172441_add_veg_non_veg_column_to_restaurants_table', 'batch' => 73]
        ]);


    }
}
