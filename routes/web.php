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

Route::get('/test', 'TestController@index');
Route::get('/test', 'TestController@index');
Route::get('/test/info', 'TestController@info');
Route::get('/city/getall/{depth?}', 'CityController@getAll');
Route::get('/city/children/{parentId}', 'CityController@children');
Route::get('/city/create', 'CityController@create');