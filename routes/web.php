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
     Route::get('news', 'Admin\NewsController@index');
<<<<<<< HEAD
     Route::get('news/edit', 'Admin\NewsController@edit'); 
    Route::post('news/edit', 'Admin\NewsController@update'); 
=======
     Route::get('news/edit', 'Admin\NewsController@edit');
     Route::post('news/edit', 'Admin\NewsController@update'); 
>>>>>>> 4df935f49a2dd77e316bb99e04f0a62f654b5954
});

//下記はprofile画面Route情報です。
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
     Route::get('profile/create','Admin\ProfileController@add');
     Route::get('admin/profile/edit', 'Admin\ProfileController@edit');
     Route::post('profile/create','Admin\ProfileController@create');
     Route::post('profile/edit', 'Admin\ProfileController@update');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

