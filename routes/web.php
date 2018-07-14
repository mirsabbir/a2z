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


Auth::routes();

Route::group(['prefix' => 'editor'], function(){
    Route::resource('posts', 'PostController');
    Route::resource('drafts', 'DraftController');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::get('/', 'HomeController@index');
Route::get('search' , 'HomeController@search')->name('search');
Route::get('{type}', 'HomeController@type');
Route::get('{type}/{slug}', 'HomeController@typePost');



