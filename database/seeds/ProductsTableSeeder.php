<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('zh_CN');
        $categoryIDs = DB::table('categories')->pluck('id')->toArray();
        foreach (range(1,20) as $index) {
            DB::table('products')->insert([
                'category_id' => $faker->randomElement($categoryIDs),
                'price' => $faker->numberBetween(199, 599),
                'name' => $faker->name()
            ]);
        }
//        factory(App\Product::class, 20)->create();
    }
}
