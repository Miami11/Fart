<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class OrderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('zh_CN');
        $productStorageIDs = DB::table('product_storage')->pluck('id')->toArray();
        foreach (range(1,20) as $index) {
            DB::table('order_detail')->insert([
                    'order_id' => App\Order::all()->random()->id,
                    'product_storage_id' => $faker->randomElement($productStorageIDs),
                    'number' => $faker->numberBetween(1, 10),
                    'price' => $faker->numberBetween(599, 1999)
                ]);

        }
//        factory(App\OrderDetail::class, 20)->create();
    }
}
