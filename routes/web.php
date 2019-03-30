<?php
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

// navigation
Route::get('/home', 'HomeController@index')->name('home');

Route::get('santri/import','SantriController@get_import');
Route::get('materi/searchMateriAjax','MateriController@searchMateriAjax');

Route::prefix('ustadz')->group(function(){
    Route::get('/','UjianController@getUjian')->name('ustadz');
    Route::get('pilih-santri','UjianController@getAllSantri')->name('pilih-santri');
    Route::post('penilaian','UjianController@getSelectedSantri');
    Route::post('simpan-nilai','UjianController@storeNilaiTes');
});


Route::resource('santri','SantriController');
Route::resource('ujian','UjianController');
Route::resource('user','UserController');
Route::resource('kelas','KelasController');
Route::resource('sekolah','SekolahController');
Route::resource('materi','MateriController');

Route::get('data-master','DataMasterList');

