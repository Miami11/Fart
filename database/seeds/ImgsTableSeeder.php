<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ImgsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('zh_CN');
        foreach (range(1,30) as $index) {
            DB::table('imgs')->insert([
                'name' => $faker->name,
                'path' => "uploads/images/products/product1524728818.jpg",
            ]);
        }
//        factory(App\Img::class, 30)->create();
    }
}
