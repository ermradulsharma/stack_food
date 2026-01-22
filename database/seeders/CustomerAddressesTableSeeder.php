<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer_addresses')->truncate();

        DB::table('customer_addresses')->insert([
            ['id' => 1, 'address_type' => 'home', 'contact_person_number' => 8801673138207, 'address' => 'Flat#602 Dhaka 1205 Bangladesh', 'latitude' => 23.7435119, 'longitude' => 90.4091189, 'user_id' => 6, 'contact_person_name' => 'Spencer Hasting', 'created_at' => now(), 'updated_at' => now(), 'zone_id' => 1],
            ['id' => 3, 'address_type' => 'home', 'contact_person_number' => 8801723019985, 'address' => 'Dhaka Medical College Hospital, Secretariat Road, Dhaka, Bangladesh', 'latitude' => 23.726057172633, 'longitude' => 90.397529192269, 'user_id' => 9, 'contact_person_name' => 'Sultan 0 Mahamud 1', 'created_at' => now(), 'updated_at' => now(), 'zone_id' => 1],
            ['id' => 4, 'address_type' => 'home', 'contact_person_number' => 8801723019986, 'address' => 'United States', 'latitude' => 37.090240070517, 'longitude' => -95.712890960276, 'user_id' => 13, 'contact_person_name' => 'sultan mahamud 2', 'created_at' => now(), 'updated_at' => now(), 'zone_id' => 1],
            ['id' => 7, 'address_type' => 'home', 'contact_person_number' => 21620555555, 'address' => '53 Dhaka  Bangladesh', 'latitude' => 23.76639123992, 'longitude' => 90.351261086762, 'user_id' => 15, 'contact_person_name' => 'hello yes', 'created_at' => now(), 'updated_at' => now(), 'zone_id' => 1],
            ['id' => 8, 'address_type' => 'office', 'contact_person_number' => 21620555555, 'address' => 'SS 127 km 59.000 Bortigiadas 07030 Italy', 'latitude' => 40.860960445864, 'longitude' => 8.9914103597403, 'user_id' => 15, 'contact_person_name' => 'hello yes', 'created_at' => now(), 'updated_at' => now(), 'zone_id' => 1],
            ['id' => 9, 'address_type' => 'home', 'contact_person_number' => 21620555555, 'address' => 'H#22,R#4,Block -B,Nobodoy Housing, Dhaka  Bangladesh', 'latitude' => 23.765276472908, 'longitude' => 90.350117795169, 'user_id' => 15, 'contact_person_name' => 'hello yes', 'created_at' => now(), 'updated_at' => now(), 'zone_id' => 1],
            ['id' => 10, 'address_type' => 'home', 'contact_person_number' => 38163627543, 'address' => 'Bulevar Kraljice MArije 54E, Kragujevac, Serbia', 'latitude' => 44.0177, 'longitude' => 20.9222, 'user_id' => 20, 'contact_person_name' => 'Dejan Đusić', 'created_at' => now(), 'updated_at' => now(), 'zone_id' => 1],
            ['id' => 11, 'address_type' => 'office', 'contact_person_number' => 919496462273, 'address' => 'Seeroo IT Solutions, NAD Road, HMT Colony, North Kalamassery, HMT Kalamassery, Kochi, Kerala, India', 'latitude' => 10.0644292478, 'longitude' => 76.351246833801, 'user_id' => 33, 'contact_person_name' => 'Elizabeth John', 'created_at' => now(), 'updated_at' => now(), 'zone_id' => 1],
            ['id' => 12, 'address_type' => 'others', 'contact_person_number' => 919496462273, 'address' => 'PNRA-74, near Oberon Mall, Padivattom, Edappally, Kochi, Kerala 682024, India', 'latitude' => 10.014865006457, 'longitude' => 76.312319599092, 'user_id' => 33, 'contact_person_name' => 'Elizabeth John', 'created_at' => now(), 'updated_at' => now(), 'zone_id' => 1],
            ['id' => 13, 'address_type' => 'home', 'contact_person_number' => 919876543210, 'address' => 'new colony deoria near gurudwara park', 'latitude' => 26.527680193136, 'longitude' => 83.912715576589, 'user_id' => 37, 'contact_person_name' => 'Asdfghj Asdfghj', 'created_at' => now(), 'updated_at' => now(), 'zone_id' => 1]
        ]);


    }
}
