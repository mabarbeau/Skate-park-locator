<?php
Route::get('/', function () {
    return view('pages.welcome');
});

Route::resource('spots', 'SpotsController');

Auth::routes();

Route::get('/home', 'HomeController@index');
