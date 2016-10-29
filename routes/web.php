<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|

*/
Route::get('/', function () {
    return view('pages.welcome');
});

Route::get('spots', 'Spots@index');
Route::get('spots/create', 'Spots@create');
Route::get('spots/{slug}', 'Spots@show');
Route::post('spots', 'Spots@store');

Auth::routes();

Route::get('/home', 'HomeController@index');
