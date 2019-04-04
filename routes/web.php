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

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();


Route::get('/getamphur', 'AmphurController@getAmphur');

Route::middleware(['auth'])->group(function () {
	Route::get('/', 'UserController@index');
	Route::get('/user', 'UserController@index');
	Route::get('/user/{id}/show', 'UserController@show');
	Route::get('/user/create', 'UserController@create');
	Route::post('/user/store', 'UserController@store');

	Route::get('/province', 'ProvinceController@index');
	Route::get('/province/create', 'ProvinceController@create');
	Route::post('/province/store', 'ProvinceController@store');

	Route::get('/province/{id}/amphur', 'AmphurController@index');
	Route::get('/province/{id}/amphur/create', 'AmphurController@create');
	Route::post('/province/{id}/amphur/store', 'AmphurController@store');

});
