<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

//            UsersTableSeeder::class,
//            CategoriesTableSeeder::class,
//            ProductsTableSeeder::class,
//            ProductStoragesTableSeeder::class,
//            OrdersTableSeeder::class,
//            OrderDetailsTableSeeder::class,
//        CouponsTableSeeder::class,
//            CouponProductsTableSeeder::class
        $this->call([
            UsersTableSeeder::class,
            CategoriesTableSeeder::class,
            ProductsTableSeeder::class,
            ProductStoragesTableSeeder::class,
            OrdersTableSeeder::class,
            OrderDetailsTableSeeder::class,
            CouponsTableSeeder::class,
            CouponProductsTableSeeder::class,
            PostsTableSeeder::class,
            ImgsTableSeeder::class,
            PostImgsTableSeeder::class,
            ProductImgsTableSeeder::class,
        ]);
    }
}
