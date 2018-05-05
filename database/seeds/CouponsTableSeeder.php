<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('zh_CN');

        foreach (range(1,10) as $index) {
            App\Coupon::create([
                'name' => $faker->name,
                'description' => $faker->sentence,
                'started_at' => $faker->dateTimeBetween('+0 days', '+10 days'),
                'ended_at' => $faker->dateTimeBetween('+20 days', '+33 days'),
                'auction_off' => $faker->numberBetween(69, 99),
            ]);
        }
//        factory(App\Coupon::class, 10)->create();
    }
}
