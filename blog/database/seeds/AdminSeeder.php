<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('admins')->insert([
        'name'  => 'Nursel',
        'email'  => 'nurselaltin@gmail.com',
        'password'  => bcrypt(123)
    ]);
    }
}
