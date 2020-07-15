<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CategorySeeder::class);
         $this->call(ArticlesSeeder::class);
         $this->call(PageSeeder::class);
         $this->call(AdminSeeder::class);
    }
}
