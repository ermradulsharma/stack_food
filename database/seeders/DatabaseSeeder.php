<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AddOnsTableSeeder::class,
            AdminRolesTableSeeder::class,
            AdminWalletsTableSeeder::class,
            AdminsTableSeeder::class,
            AttributesTableSeeder::class,
            BannersTableSeeder::class,
            BusinessSettingsTableSeeder::class,
            CampaignRestaurantTableSeeder::class,
            CampaignsTableSeeder::class,
            CategoriesTableSeeder::class,
            CurrenciesTableSeeder::class,
            CustomerAddressesTableSeeder::class,
            DMReviewsTableSeeder::class,
            DeliveryHistoriesTableSeeder::class,
            DeliveryManWalletsTableSeeder::class,
            DeliveryMenTableSeeder::class,
            DiscountsTableSeeder::class,
            EmployeeRolesTableSeeder::class,
            FoodTableSeeder::class,
            ItemCampaignsTableSeeder::class,
            NotificationsTableSeeder::class,
            OauthAccessTokensTableSeeder::class,
            OauthClientsTableSeeder::class,
            OauthPersonalAccessClientsTableSeeder::class,
            OrderDetailsTableSeeder::class,
            OrderTransactionsTableSeeder::class,
            OrdersTableSeeder::class,
            PasswordResetsTableSeeder::class,
            PhoneVerificationsTableSeeder::class,
            RestaurantWalletsTableSeeder::class,
            RestaurantsTableSeeder::class,
            ReviewsTableSeeder::class,
            UserNotificationsTableSeeder::class,
            UsersTableSeeder::class,
            VendorsTableSeeder::class,
            WishlistsTableSeeder::class,
            ZonesTableSeeder::class,

        ]);
    }
}
