<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PostImgsTableSeeder extends Seeder
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
        $postIDs = DB::table('posts')->pluck('id')->toArray();

        foreach (range(1,10) as $index) {

            DB::table('img_post')->insert([
                'img_id' => $faker->randomElement($imgIDs),
                'post_id' => $faker->randomElement($postIDs),
            ]);
        }
//        factory(App\PostImg::class, 10)->create();
    }
}
