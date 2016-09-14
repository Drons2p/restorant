<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::post('/сategory/create/', 'CategoryController@create'); 
Route::post('/сategory/save/', 'CategoryController@save');

Route::get('/', 'IndexController@index');
Route::get('/order/ind/index', 'OrderController@index');
Route::get('/order/grup/index', 'OrderController@grupindex');


Route::get('/logout', 'IndexController@logout');
Route::post('/login', 'IndexController@login');
Route::post('/user/registration', 'UserController@create');


Route::post('/dish/create', 'DishController@create');


Route::post('/order/create', 'OrderController@create');


Route::get('/grup/sync/{id}', 'GrupController@sync');
Route::get('/grup/req/{id}', 'GrupController@req');
Route::get('/grup/accept/{id}', 'GrupController@accept');
Route::get('/grup/detach/{user_id}/{grup_id}', 'GrupController@detach');


