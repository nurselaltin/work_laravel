<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class App extends Controller
{
   function  index(){

       //$users =DB::table('users')->where('age','<',20)->get();
       // $users = User::all()->where('gender','=','1');


        /*User model sınıfını kullanarak DB işlemleri yapıyoruz.
        $user = new  User();
        $user->name='Nursel';
        $user->email = 'nurselaltin.na@gmail.com';
        $user->gender='1';
        $user->age=25;
        $user->password=md5(123);
        $user->save();
        */

        $users = User::find(22);
        $users->name = 'Nursel ALTIN';
        $users->save();

       print_r($users);
       die();


   }

   function  findUser($id){

       $uye = DB::table('users')->find($id);

       echo $uye->name;
       exit;

   }


}
