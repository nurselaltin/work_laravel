<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});
Route::get('/admin',function (){
   return view('admin');
});
Route::get('/bilgiler/{ad?}/{soyad?}/{no?}', 'AdminController@index');

Route::get('/hakkimizda', 'AdminController@hakkimizda')->name('hakkimizda');
Route::get('/geri','AdminController@index')->name('geri');;


Route::get('/app','App@index')->name('app');
Route::get('/uye/{id}','App@findUser');

//------------------------------------------------------


Route::get('/','HomeController@index')->name('index');
Route::get('/account','HomeController@account')->name('account');
Route::get('/profile','HomeController@profile')->name('profile');


//-------------------------------------------------------

//   BLOG

//Homepage
Route::get('/','Front\Homepage@index')->name('homepage');

Route::get('/sayfa','Front\Homepage@index');

//İletişim Sayfası
Route::get('/iletisim','Front\Homepage@contact')->name('contact.page');
Route::post('/iletisim','Front\Homepage@contactPost')->name('contact.post');
//Page
Route::get('/{pages}','Front\Homepage@pages')->name('page');

//Kategori Sayfası

Route::get('/kategori/{slug}','Front\Homepage@categoriesPost')->name('categories.post');

//Single Blog
Route::get('/{category}/{slug}','Front\Homepage@singlePost')->name('single.post');






