<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductStoragesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('zh_CN');
        $productIDs = DB::table('products')->pluck('id')->toArray();

        foreach (range(1,30) as $index) {
            DB::table('product_storage')->insert([
                'product_id'=> $faker->randomElement($productIDs),
                'number' => $faker->numberBetween(1, 20),
                'size' => $faker->numberBetween(80, 120),
            ]);
        }
        //        'product_id' => App\Product::all()->random()->id,
//        'number' => $faker->numberBetween(1,20),
//        'size' => $faker->numberBetween(80,120),
//        factory(App\ProductStorage::class, 30)->create();
    }
}
