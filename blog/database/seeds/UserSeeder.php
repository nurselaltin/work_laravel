<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       /* $category = ['Beyaz Eşya','Elektronik'];

        foreach ($category as $cat){

            DB::table('users')->insert([
                'name' => $cat,
                'email' => 'nurselaltin.na@gmail.com',
                'password' => md5('1234')
            ]);

        }*/


       //Faker Kütüphanesini kullanrak veri ekliyoruz

        $faker = Faker::create();
        for($i = 0; $i<= 20 ; $i++){

            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'age' => rand(15,50),
                'gender' => 1,
                'password' => md5('1234')
            ]);
        }


    }
}
