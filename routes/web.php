<?php
Route::get('/', function () {
    return view('pages.welcome');
});

Route::resource('spots', 'Spots');

Auth::routes();

Route::get('/home', 'HomeController@index');
