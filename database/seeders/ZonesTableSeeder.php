<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ZonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('zones')->truncate();

        DB::table('zones')->insert([
            ['id' => 1, 'name' => 'All over the World', 'coordinates' => '0x0000000001030000000100000025000000de577956da4566c05ffb2847ee105140de57795612f065c0f4b1e90cbee75040de577956227765c054d9a52e5ab25040de577956123c65c059bde101cc885040de5779563a5f65c0c59ef914fa635040de5779561a9d65c0958caee6411a5040de57795642ed65c05754a92b533e5040de5779560a4366c0ac30798df16a5040de577956d23e66c06bbe60bb649f504022a886a9157f664044ccf8a6df91504022a886a9d5736640616fece9b340504022a886a9f562664027dbc3505a504f408b31538b82356440d6f5637e0f4e4c408b31538b62b162400f243ffb874b1ac08b31538be21e6640d1c08f519a4e43c08b31538b022d6540cb0b0984db1047c08b31538b229861406e3c7181204342c01563a61685145d403c18fa5e73ad40c09ec54c2d8a634640756126aaa37138c03c8b995a142b3440ccd3e164b0e540c0319d59e9ba3151c04883e9781b1b4bc0319d59e97a8e52c0937dad3429d548c0319d59e97a2651c0c48214170a0f33c0319d59e9baa753c02b9648092dfb20c0eb9c59e9ba7459c0b584594c36e63240eb9c59e93aa45ec0918fdd9dcaa6434075ceac741d8a63c02ea401df41044d4075ceac745dd064c08073b254e767504075ceac749dae64c08ed0c2d00d28514075ceac74bd8f63c0a529db2454bf5140eb9c59e97aea5fc01b075ce0df735140319d59e93abe53c0e8f8976fb6a754403c8b995a141739405ee27cdd06ed53409ec54c2d8a3e4d4029474755d4c152401563a616c54f5a400a438459e4e652408b31538b62fd6140527bedec1df55140de577956da4566c05ffb2847ee105140', 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'restaurant_wise_topic' => 'zone_1_restaurant', 'customer_wise_topic' => 'zone_1_customer', 'deliveryman_wise_topic' => 'zone_1_delivery_man'],
            ['id' => 2, 'name' => 'fenitzerplatz', 'coordinates' => '0x00000000010300000001000000060000002346a83e5b2c264090b6d04f94bb4840b747a83e143726401c8d54434bba48405846a83e2832264018b9120139b948408446a8be4d232640820a537589b948404e47a83e3a202640168e9ac3faba48402346a83e5b2c264090b6d04f94bb4840', 'status' => 0, 'created_at' => now(), 'updated_at' => now(), 'restaurant_wise_topic' => 'zone_2_restaurant', 'customer_wise_topic' => 'zone_2_customer', 'deliveryman_wise_topic' => 'zone_2_delivery_man'],
            ['id' => 3, 'name' => 'Farmgate', 'coordinates' => '0x0000000001030000000100000005000000fc2140f3a0975640ebf6e07e32c337401522400b2c9a5640129d656251c33740072240cb209a564017b79388bbbe3740ef2140b395975640e9e912caa1be3740fc2140f3a0975640ebf6e07e32c33740', 'status' => 0, 'created_at' => now(), 'updated_at' => now(), 'restaurant_wise_topic' => 'zone_3_restaurant', 'customer_wise_topic' => 'zone_3_customer', 'deliveryman_wise_topic' => 'zone_3_delivery_man'],
            ['id' => 4, 'name' => 'NAZIMABAD', 'coordinates' => '0x0000000001030000000100000009000000bde7fb68d394564065b8af06d1ca3740ace7fb58c5945640706c85703bc6374099e7fb786895564021ea5883a8c3374091e7fbe8059756401b496de2e4c23740a9e7fb88fa98564060da09ef1dc7374099e7fb788497564078ddeff637cb374095e7fba819965640b7e809032fcc3740c6e7fbe81695564097e2558bfbcb3740bde7fb68d394564065b8af06d1ca3740', 'status' => 0, 'created_at' => now(), 'updated_at' => now(), 'restaurant_wise_topic' => 'zone_4_restaurant', 'customer_wise_topic' => 'zone_4_customer', 'deliveryman_wise_topic' => 'zone_4_delivery_man'],
            ['id' => 5, 'name' => 'កញ្ចប់', 'coordinates' => '0x0000000001030000000100000004000000ea68f1b2123a5a401f7358564c1827402268f19afd395a40961b9467e91827403968f186023a5a40a383ceef01182740ea68f1b2123a5a401f7358564c182740', 'status' => 1, 'created_at' => now(), 'updated_at' => now(), 'restaurant_wise_topic' => 'zone_5_restaurant', 'customer_wise_topic' => 'zone_5_customer', 'deliveryman_wise_topic' => 'zone_5_delivery_man']
        ]);


    }
}
