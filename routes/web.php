<?php
Route::get('/', function () {
    return view('pages.welcome');
});

Route::resource('spots/{slug}/features', 'Admin\FeaturesController');
Route::resource('spots', 'Admin\SpotsController');

Auth::routes();

Route::get('/home', 'HomeController@index');
