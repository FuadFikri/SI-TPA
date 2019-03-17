<?php
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

// navigation
Route::get('/home', 'HomeController@index')->name('home');

Route::get('santri/import','SantriController@get_import');
// Route::post('santri/import','SantriController@post_import');
Route::resource('santri','SantriController');
Route::resource('ujian','UjianController');
Route::resource('user','UserController');

