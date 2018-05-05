<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CouponProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('zh_CN');

        $couponIDs = DB::table('coupons')->pluck('id')->toArray();
        $productIDs= DB::table('products')->pluck('id')->toArray();
        foreach (range(1,15) as $index){
            DB::table('coupon_product')->insert([
        'coupon_id'=> $faker->randomElement($couponIDs),
        'product_id'=> $faker->randomElement($productIDs),
    ]);
        }
//        factory(App\CouponProduct::class, 15)->create();
    }
}
