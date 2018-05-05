<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('zh_CN');

        for ($i=0; $i < 10; $i++) {
            App\Category::create([
                'type' => $faker->colorName()
            ]);

        }

//        factory(App\Category::class, 5)->create();
    }
}
