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

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/metode', 'HomeController@metode')->name('home-metode');
    Route::get('/tentang', 'HomeController@tentang')->name('home-tentang');
    Route::get('/login', 'AuthController@login')->name('login');
    Route::get('/register', 'AuthController@register')->name('register');
    Route::post('/login-logic', 'AuthController@loginLogic')->name('loginLogic');
    Route::post('/register-logic', 'AuthController@registerLogic')->name('registerLogic');
});

Route::group(['middleware' => ['auth', 'role:admin,pelamar,direktur']], function () {
    Route::get('/logout', 'AuthController@logout')->name('logout');
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
});

Route::group(['middleware' => ['auth', 'role:admin,pelamar']], function () {
    Route::get('/informasi', 'InformasiController@index')->name('informasi-index');
});

Route::group(['middleware' => ['auth', 'role:pelamar']], function () {
    Route::get('/alternatif-biodata', 'AlternatifController@biodata')->name('alternatif-biodata');
    Route::post('/alternatif-biodata/store', 'AlternatifController@biodataStore')->name('alternatif-biodata-store');
    Route::post('/alternatif-biodata/nilai', 'AlternatifController@biodataNilai')->name('alternatif-biodata-nilai');
    // Route::put('/alternatif-biodata/update/{id_user}', 'AlternatifController@biodataUpdate')->name('alternatif-biodata-update');
});

Route::group(['middleware' => ['auth', 'role:direktur,admin']], function () {
    Route::get('/laporan', 'LaporanController@index')->name('laporan-index');
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/alternatif', 'AlternatifController@index')->name('alternatif-index');
    Route::get('/alternatif-detail/{id}', 'AlternatifController@detail')->name('alternatif-detail');
    Route::get('/kriteria', 'KriteriaController@index')->name('kriteria-index');
    Route::get('/detail-kriteria', 'KriteriaController@detail')->name('kriteria-detail');
    Route::get('/seleksi', 'SeleksiController@index')->name('seleksi-index');
    Route::get('/seleksi/input-nilai/{id}', 'SeleksiController@inputNilai')->name('seleksi-input-nilai');
    Route::post('/seleksi/input-nilai/store/{id}', 'SeleksiController@inputNilaiStore')->name('input-nilai-store');
});

Route::get('contoh-ui', function () {
    return view('pages.contoh-ui.contoh-ui');
});
