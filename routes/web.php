<?php
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

// navigation
Route::get('/home', 'HomeController@index')->name('home');

Route::get('santri/import','SantriController@get_import');
Route::prefix('ustadz')->group(function(){
    Route::get('/','UjianController@getUjian');
    Route::get('pilih-santri','UjianController@getAllSantri')->name('pilih-santri');
    Route::post('penilaian','UjianController@getSelectedSantri');
    // Route::post('penilaian','UjianController@storeNilaiTes');
});


Route::resource('santri','SantriController');
Route::resource('ujian','UjianController');
Route::resource('user','UserController');
Route::resource('kelas','KelasController');
Route::resource('sekolah','SekolahController');

Route::get('data-master','DataMasterList');

