<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
|BACK ROUTE
|--------------------------------------------------------------------------
|
|
*/

//Giriş yapılmışsa tekrardan  panele yönlendir
Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function (){
    Route::get('giris','Back\AuthController@login')->name('login');
    Route::post('giris','Back\AuthController@loginPost')->name('login.post');
});


//Giriş yapmadan içeriye erişilmeye çalışıyorsa logine yönlendir
Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function (){
    Route::get('panel','Back\Dashboard@index')->name('dashboard');
    Route::get('/articles/trashed','Back\ArticleController@trashed')->name('trashed.articles');
    Route::resource('makaleler','Back\ArticleController');
    Route::get('/switch','Back\ArticleController@switch')->name('switch');
    Route::get('/delete/{id}','Back\ArticleController@delete')->name('delete.article');
    Route::get('/deleteArticles/{id}','Back\ArticleController@hardDelete')->name('hardDelete.article');
    Route::get('/recover/{id}','Back\ArticleController@recover')->name('recover');
    Route::get('cikis','Back\AuthController@logout')->name('logout');
});













/*
|--------------------------------------------------------------------------
|FRONT ROUTE
|--------------------------------------------------------------------------
|


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




