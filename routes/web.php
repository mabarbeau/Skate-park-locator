<?php
Route::get('/', function () {
    return view('pages.welcome');
});

Route::resource('spots/{slug}/tags', 'Admin\TagsController');
Route::resource('spots', 'Admin\SpotsController');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('token/{token}', 'Auth\LoginController@byToken');
Route::get('token', function () {
    $tokens = App\LoginToken::select('value', 'user_id')->get();
    foreach ($tokens as $token) {
        echo "<a href='/token/$token->value'>" . $token->user->name . "</a>(". $token->user->roles()->first()->name .")<br>";
    }
    die;
});
