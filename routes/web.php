<?php
Route::get('/', function () {
    return view('pages.welcome');
});

Route::get('spots', 'Spots@index');
Route::get('spots/create', 'Spots@create');
Route::get('spots/{slug}', 'Spots@show');
Route::get('spots/{slug}/edit', 'Spots@edit');
Route::post('spots', 'Spots@store');

Auth::routes();

Route::get('/home', 'HomeController@index');
