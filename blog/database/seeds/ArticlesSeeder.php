<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $faker =Faker::create();

          for ($i=1;$i<=5;$i++){
              $title = $faker->sentence(6);
              DB::table('articles')->insert([
                  'category_id' =>rand(1,6),
                  'title' => $title,
                  'image' => $faker->imageUrl(800, 400, 'cats'),
                  'content'=> $faker->paragraph(6),
                  'slug'  => Str::slug($title),
                  'state'  => 1,
                  'created_at' => $faker->dateTime('now')
              ]);
          }
    }
}
