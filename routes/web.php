<?php

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

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
     Route::get('news/create', 'Admin\NewsController@add');
     Route::post('news/create', 'Admin\NewsController@create'); 
});

Route::get('admin/profile/create','Admin\ProfileController@add');
Route::get('admin/profile/edit', 'Admin\ProfileController@edit')->middleware('auth');


///下記はPHP/Laravel 13の3番です。
Route::group(['prefix' => 'admin'], function(){
    Route::get('aaa/create', 'Admin\AAAController@bbb');
});


//下記はPHP/Laravel 13の4番です。
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
     Route::get('admin/profile/create','Admin\ProfileController@add');   
     Route::post('admin/profile/create','Admin\ProfileController@create');
　　 Route::post('admin/profile/edit', 'Admin\ProfileController@update');//←はPHP/Laravel 13の6番です。
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
