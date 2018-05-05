<?php

use Illuminate\Database\Seeder;
use App\Product;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductImgsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('zh_CN');
        $imgIDs = DB::table('imgs')->pluck('id')->toArray();
        $productIDs = DB::table('products')->pluck('id')->toArray();
        foreach (range(1,20) as $index) {
            DB::table('img_product')->insert([
                'img_id'=> $faker->randomElement($imgIDs),
                'product_id'=> $faker->randomElement($productIDs),
            ]);
        }

//        factory(Product::class, 10)
//            ->create()
//            ->each(function (Product $product) {
//                collect(range(1, 3))->each(function () use ($product) {
//                    $product->posts()->save(factory(Post::class)->make());
//                });
//            });
//        collect(range(1, 10))->each(function (int $imgId) {
//            factory(Product::class)->create([
//                'img_id' => $imgId
//            ]);
//        });
//        factory(App\ProductImg::class, 20)->create();
    }
}
