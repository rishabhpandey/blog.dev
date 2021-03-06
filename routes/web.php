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

Route::get('/home', 'HomeController@index');

Route::get('/create', 'HomeController@create');

Route::post('/store','HomeController@store');

//Route::patch('/{id}/update','HomeController@update');

Route::get('/{id}/edit','HomeController@edit');

Route::get('/{id}/delete', 'HomeController@destroy');
