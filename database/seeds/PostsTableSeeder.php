<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class PostsTableSeeder extends Seeder
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
            DB::table('posts')->insert([
                'title' => $faker->title,
                'summary' => $faker->sentence,
                'content' => $faker->paragraph,
                'is_public' => $faker->boolean,
                'created_at' => $faker->dateTime($max = 'now'),
                'updated_at' => $faker->dateTime($max = 'now'),
            ]);
        }
//        factory(App\Post::class, 10)->create();
    }
}
