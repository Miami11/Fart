<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('zh_CN');
        $userIDs= DB::table('users')->pluck('id')->toArray();

        foreach (range(1, 10) as $index) {
            App\Order::create([
                'user_id' => $faker->randomElement($userIDs),
                'name' => $faker->name(),
                'address' => $faker->address,
                'tel' => '0987123123'
            ]);

        }

//        factory(App\Order::class, 10)->create();
    }
}
