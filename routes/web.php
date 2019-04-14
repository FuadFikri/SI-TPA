<?php

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

// navigation

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    
    Route::get('santri/import','ExcelController@get_import');
    Route::post('santri/import','ExcelController@post_import');
    Route::get('materi/searchMateriAjax','MateriController@searchMateriAjax');
    Route::get('lihat-nilai','PenilaianController@hasilUjianPerMateri');
    Route::get('ujian/cetak-raport','PenilaianController@cetak_raport');
    Route::prefix('ustadz')->group(function(){
        Route::get('/','PenilaianController@getUjian')->name('ustadz');
        Route::get('pilih-santri','PenilaianController@getAllSantri')->name('pilih-santri');
        Route::post('penilaian','PenilaianController@getSelectedSantri');
        Route::post('simpan-nilai','PenilaianController@storeNilaiTes');
    });
    
    Route::resource('santri','SantriController');
    
    
    Route::resource('ujian','UjianController');
    Route::resource('user','UserController');
    Route::resource('kelas','KelasController');
    Route::resource('sekolah','SekolahController');
    Route::resource('materi','MateriController');
    
    Route::get('data-master','DataMasterList');
    Route::get('ruang-srawung',function(){
        return view('UnderConstruction');
    });
});


