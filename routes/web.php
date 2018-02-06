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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/dashboard', 'HomeController@index')->name('admin/dashboard');
Route::get('/admin/logout', 'HomeController@logout');
Route::get('/manage_banner', 'bannerController@index');
Route::get('/manage_banner/edit/{id}', 'bannerController@edit');
Route::post('/updateBanner/{id}', ['as'=>'updateBanner', 'uses'=>'bannerController@update']);
Route::get('/manage_flag', 'flagController@index');
Route::post('/manage_flag/update/{id}', ['as'=>'updateFlag', 'uses'=>'flagController@updateFlag']);
Route::get('/manage_flag/change_sequence/{id}/{seq}', 'flagController@change_sequence');
Route::post('addFlag', 'flagController@addFlag');
Route::get('/manage_flag/delete/{id}', 'flagController@deleteFlag');
Route::get('/manage_flag/edit/{id}', 'flagController@edit');
Route::get('/manage_news', 'ManageNewsController@index');
Route::get('/manage_news/edit/{id}', 'ManageNewsController@edit');
Route::post('updateNews/{id}', ['as'=>'updateNews', 'uses'=>'ManageNewsController@update']);
Route::get('manage_news/change_sequence/{id}/{seq}', 'ManageNewsController@change_sequence');
Route::get('manage_news/status', 'ManageNewsController@status');