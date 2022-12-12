<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $exitCode = \Artisan::call('cache:clear');
    return redirect()->route('login');

});

Auth::routes();

Route::group(['middleware'=>'auth'], function () {

    // Route::get('/home', function() { return view('backand.dasboard'); })->name('home');
    Route::get('home', 'HomeController@index')->name('home')->middleware('auth');
    Route::get('setting-data', 'UserController@settingakun');
    Route::resource('kelola-kriteria', 'KriteriaController');
    // Route::resource('kriteria/{kriteria}/pilihan', 'PilihanKriteriaController');
    Route::resource('kelola-users','UserController');
    Route::resource('kelola-alternatif', 'AlternatifController') ;
    Route::get('kelola-alternatif/{id}/isi', 'AlternatifController@isi')->name('kelola-alternatif.isi') ;
    Route::post('kelola-alternatif/{id}/isi', 'AlternatifController@saveIsi')->name('kelola-alternatif.save_isi') ;
    Route::resource('kelola-penilaian', 'PenilaianController');
    Route::get('/logout', 'HomeController@logout');

    Route::get('setting-profil', 'UserController@settingakun');
    //user pilih menu
    Route::resource('pilih-menu', 'PilihanAlternatifController');
    Route::get('pilih-menu-reset', 'PilihanAlternatifController@reset');
    Route::resource('hasil-rekomendasi','HasilRekomendasiController');
    Route::get('hapus-hasil-rekomendasi', 'HasilRekomendasiController@destroy');
 });