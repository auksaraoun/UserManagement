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
	
	Route::get('/user/{id}/edit', 'UserController@edit');
	Route::patch('/user/{id}/update', 'UserController@update');
	Route::delete('/user/{id}/delete', 'UserController@destroy');

	Route::get('/province', 'ProvinceController@index');
	Route::get('/province/create', 'ProvinceController@create');
	Route::get('/province/{id}/edit', 'ProvinceController@edit');
	Route::patch('/province/{id}/update', 'ProvinceController@update');
	Route::post('/province/store', 'ProvinceController@store');
	Route::delete('/province/{id}/delete', 'ProvinceController@destroy');

	Route::get('amphur', 'AmphurController@index');
	Route::get('amphur/create', 'AmphurController@create');
	Route::post('amphur/store', 'AmphurController@store');

	Route::get('/amphur/{id}/edit', 'AmphurController@edit');
	Route::patch('/amphur/{id}/update', 'AmphurController@update');
	Route::delete('/amphur/{id}/delete', 'AmphurController@destroy');

});
