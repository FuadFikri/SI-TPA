<?php
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

// navigation
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('santri','SantriController');