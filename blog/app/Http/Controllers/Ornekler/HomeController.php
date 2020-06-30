<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
   function  index(){

       return view('index');
   }
   function  account(){

    return view('account');
    }
    function  profile(){

        return view('profile');
    }

}
