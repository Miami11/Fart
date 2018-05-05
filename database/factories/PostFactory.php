<?php

use Faker\Generator as Faker;

//$factory->define(Model::class, function (Faker $faker) {
//    return [
//        //
//    ];
//});
//$factory->define(App\User::class, function (Faker $faker) {
//    return [
//        'name' => $faker->name,
//        'email' => $faker->unique()->safeEmail,
//        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
//        'tel' => '0987123123',
//        'img'=>'member/default',
//        'remember_token' => str_random(10),
//    ];
//});
//
//$factory->define(App\Category::class, function (Faker $faker) {
//    return [
//        'type' => $faker->colorName()
//    ];
//});
//
//
//
//$factory->define(App\Product::class, function (Faker $faker) {
//    return [
//        'category_id'=> App\Category::all()->random()->id,
//        'price' => $faker->numberBetween(199,599),
//        'name' => $faker->name()
//
//    ];
//});
//
//
//$factory->define(App\ProductStorage::class, function (Faker $faker) {
//    return [
//        'product_id' => App\Product::all()->random()->id,
//        'number' => $faker->numberBetween(1,20),
//        'size' => $faker->numberBetween(80,120),
//    ];
//});
//
//$factory->define(App\Order::class, function (Faker $faker) {
//    return [
//        'user_id'=> App\User::all()->random()->id,
//        'name' => $faker->name(),
//        'address' => $faker->address,
//        'tel' => '0987123123'
//    ];
//});
//
//
//$factory->define(App\OrderDetail::class, function (Faker $faker) {
//    return [
//        'order_id' => App\Order::all()->random()->id,
//        'product_storages_id'=> App\ProductStorage::all()->random()->id,
//        'number' => $faker->numberBetween(1,10),
//        'price' => $faker->numberBetween(599,1999)
////        'name' => $faker->name()
//
//    ];
//});
//
////sentence 沒有s
//$factory->define(App\Coupon::class, function (Faker $faker) {
//    return [
//        'name' => $faker->name,
//        'description' => $faker->sentence,
//        'started_at' => $faker->dateTimeBetween('+0 days','+10 days'),
//        'ended_at' => $faker->dateTimeBetween('+20 days','+33 days'),
//        'auction_off' => $faker->numberBetween(69,99),
//    ];
//});
//
//$factory->define(App\CouponProduct::class, function (Faker $faker) {
//    return [
//        'coupon_id'=> App\Coupon::all()->random()->id,
//        'product_id'=> App\Product::all()->random()->id,
//    ];
//});

//$factory->define(App\Post::class, function (Faker $faker) {
////    $faker = f::create('zh_CN');
//    return [
//        'title' => $faker->title,
//        'summary' => $faker->sentence,
//        'content' => $faker->paragraph,
//        'is_public' => $faker->boolean,
//    ];
//});
//
//$factory->difine(App\Img::class, function (Faker $faker) {
//    return [
//        'name' => $faker->name,
//        'path' => 'uploads/images/products/product1524728818.jpg',
//    ];
//});
//$factory->define(App\PostImg::class, function (Faker $faker) {
//    return [
//        'img_id'=> App\Img::all()->random()->id,
//        'post_id'=> App\Post::all()->random()->id,
//    ];
//});
//$factory->define(App\ProductImg::class, function (Faker $faker) {
//    return [
//        'img_id'=> App\Img::all()->random()->id,
//        'product_id'=> App\Product::all()->random()->id,
//    ];
//});