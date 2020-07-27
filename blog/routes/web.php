<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
|BACK ROUTE
|--------------------------------------------------------------------------
|
|
*/

Route::get('site-bakimda',function (){
    return view('front.offline');
});


//Giriş yapılmışsa tekrardan  panele yönlendir
Route::prefix('admin')->name('admin.')->middleware('isLogin')->group(function (){
    Route::get('giris','Back\AuthController@login')->name('login');
    Route::post('giris','Back\AuthController@loginPost')->name('login.post');
});


//Giriş yapmadan içeriye erişilmeye çalışıyorsa logine yönlendir
Route::prefix('admin')->name('admin.')->middleware('isAdmin')->group(function (){

      //Makale Routes
    Route::get('panel','Back\Dashboard@index')->name('dashboard');
    Route::get('/articles/trashed','Back\ArticleController@trashed')->name('trashed.articles');
    Route::resource('makaleler','Back\ArticleController');
    Route::get('/switch','Back\ArticleController@switch')->name('makaleler.switch');
    Route::get('/delete/{id}','Back\ArticleController@delete')->name('delete.article');
    Route::get('/deleteArticles/{id}','Back\ArticleController@hardDelete')->name('hardDelete.article');
    Route::get('/recover/{id}','Back\ArticleController@recover')->name('recover');
 

    //Kategori Routes
    Route::get('kategori','Back\CategoryController@index')->name('category.index');
    Route::post('kategori/create','Back\CategoryController@create')->name('category.create');
    Route::get('kategori/state','Back\CategoryController@switch')->name('category.switch');
    Route::get('kategori/getData','Back\CategoryController@getData')->name('category.getdata');
    Route::post('kategori/update','Back\CategoryController@update')->name('category.update');
    Route::post('kategori/delete','Back\CategoryController@delete')->name('category.delete');
    
    //Sayfa Routes
    Route::get('sayfa','Back\PageController@index')->name('page.index');
    Route::get('sayfalar/create','Back\PageController@create')->name('page.create');
    Route::post('sayfalar/olustur','Back\PageController@post')->name('page.post');
    Route::get('sayfalar/duzenle/{id}','Back\PageController@edit')->name('page.edit');
    Route::post('sayfalar/guncelle/{id}','Back\PageController@update')->name('page.update');
    Route::get('sayfalar/sil/{id}','Back\PageController@delete')->name('page.delete');
    Route::get('/switch','Back\PageController@switch')->name('page.switch');

    //Ayarlar Route

    Route::get('config','Back\ConfigController@index')->name('config.index');
    Route::post('config','Back\ConfigController@save')->name('config.save');

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




