<?php

use Illuminate\Support\Facades\Route;
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

// route halaman resgister
Route::get('/register-admin', function () {
    return view('register_admin');
});

Route::post('/register-admin', 'AdminController@register');

// route halaman login
Route::get('/', function () {
    return view('login');
});

Route::post('/login', 'OtentikasiController@login');

Route::get('notFound', function(){
    return view('errors.404');
});


// Grup Route admin
Route::group(['middleware' => ['CekLoginMiddleware:admin']], function(){

    // ======================================================================
    // kumpulan route admin

    Route::get('/admin', 'AdminController@index');

    Route::get('/admin/{id}/edit', 'AdminController@edit');
    
    Route::put('/admin/{id}', 'AdminController@update');

    Route::delete('/admin/{id}', 'AdminController@destroy');
    
    // ======================================================================
    // kupulan route pengumuman

    Route::get('/pengumuman/create', 'PengumumanController@create');

    Route::post('/pengumuman', 'PengumumanController@store');

    Route::get('/pengumuman/{id}/edit', 'PengumumanController@edit');

    Route::put('/pengumuman/{id}', 'PengumumanController@update');

    Route::delete('/pengumuman/{id}', 'PengumumanController@destroy');

    // ======================================================================
    // kumpulan route kelas
    Route::get('/kelas', 'KelasController@index');

    Route::get('/kelas/create', 'KelasController@create');

    Route::post('/kelas', 'KelasController@store');

    Route::get('/kelas/{id}/edit', 'KelasController@edit');

    Route::put('/kelas/{id}', 'KelasController@update');

    Route::delete('/kelas/{id}', 'KelasController@destroy');

    // ======================================================================

    Route::get('/guru', 'GuruController@index');

    Route::get('/guru/create', 'GuruController@create');
    
    Route::post('/guru', 'GuruController@store');

    Route::get('/guru/{id}', 'GuruController@show');

    Route::delete('/guru/{id}', 'GuruController@destroy');

// ===================================================================
    // kumpulan route siswa

    Route::get('/siswa', 'SiswaController@index');

    Route::get('/siswa/create', 'SiswaController@create');
    
    Route::post('/siswa', 'SiswaController@store');

    Route::delete('/siswa/{noRef}', 'SiswaController@destroy');

    // ===================================================================
    // kumpulan route siswa ekstrakulikuler

    Route::get('/siswaEskul', 'SiswaEkstrakulikulerController@index');

    Route::get('/siswaEskul/{siswa_id}/edit', 'SiswaEkstrakulikulerController@edit');

    Route::post('/siswaEskul', 'SiswaEkstrakulikulerController@store');

    // ===================================================================
    // kumpulan route mapel

    Route::get('/mapel', 'MapelController@index');

    Route::get('/mapel/create', 'MapelController@create');

    Route::post('/mapel', 'MapelController@store');

    Route::get('/mapel/{id}/edit', 'MapelController@edit');

    Route::put('/mapel/{id}', 'MapelController@update');

    Route::delete('/mapel/{id}', 'MapelController@destroy');

// ===================================================================
    // kumpulan route jadwal

    Route::get('/jadwal/create', 'JadwalController@create');
    
    Route::post('/jadwal', 'JadwalController@store');

    Route::get('/jadwal/{id}/edit', 'JadwalController@edit');

    Route::put('/jadwal/{id}', 'JadwalController@update');

    Route::delete('/jadwal/{id}', 'JadwalController@destroy');
// ===================================================================
    // kumpulan route kkm 

    Route::get('/kkm', 'KkmController@index');

    Route::post('/kkm/create2', 'KkmController@create2');
    
    Route::post('/kkm', 'KkmController@store');
    
    Route::get('/kkm/{tahun_ajaran_id}/{mapel_id}/edit', 'KkmController@edit');

    Route::put('/kkm', 'KkmController@update');

    Route::delete('/kkm/{mapel_id}', 'KkmController@destroy');

// ===================================================================
    // kumpulan route ekstrakulikuler

    Route::get('/eskul', 'EkstrakulikulerController@index');

    Route::get('/eskul/create', 'EkstrakulikulerController@create');

    Route::post('/eskul', 'EkstrakulikulerController@store');

    Route::get('/eskul/{id}/edit', 'EkstrakulikulerController@edit');

    Route::put('/eskul/{id}', 'EkstrakulikulerController@update');

    Route::delete('/eskul/{id}', 'EkstrakulikulerController@destroy');
// ===================================================================
    // kumpulan route tahu ajaran

    Route::get('/tahunAjaran', 'tahunAjaranController@index');

    Route::get('/tahunAjaran/create', 'tahunAjaranController@create');
    
    Route::post('/tahunAjaran', 'tahunAjaranController@store');

    Route::get('/tahunAjaran/{id}/edit', 'tahunAjaranController@edit');

    Route::put('/tahunAjaran/{id}', 'tahunAjaranController@update');

    Route::delete('/tahunAjaran/{id}', 'tahunAjaranController@destroy');

// ===================================================================

    // untuk redirect ke halaman 4040
    // karena sudah di middleware siswa
    Route::get('/nilaiTampil', 'nilaiSiswaController@nilaiTampil');

});


// grub route admin dan guru
Route::group(['middleware' => ['CekLoginMiddleware:admin,guru']], function(){
    // =========================================================================
    // kumpulan route guru

    Route::get('/guru/{noRef}/edit', 'GuruController@edit');

    Route::put('/guru/{noRef}', 'GuruController@update');
    
});



// middleware admin dan siswa
Route::group(['middleware' => ['CekLoginMiddleware:admin,siswa']], function(){
    // =========================================================================
    // route pengumuman

    Route::get('/pengumuman', 'PengumumanController@index');
    // =========================================================================

    // kumpulan route siswa
    Route::get('/siswa/{noRef}/edit', 'SiswaController@edit');

    Route::put('/siswa/{noRef}', 'SiswaController@update');
    // =========================================================================
    // kumpulan reoute jadwal

    Route::get('/jadwal', 'JadwalController@index');

    Route::post('/jadwalTampil', 'JadwalController@jadwalTampil');
    // =========================================================================
});



// middleware siswa admin guru
Route::group(['middleware' => ['CekLoginMiddleware:admin,guru,siswa']], function(){
    Route::get('/home', 'HomeController@index');

    // =========================================================================

    Route::get('/logout', 'OtentikasiController@logout');
});



// Grup Route Guru
Route::group(['middleware' => ['CekLoginMiddleware:guru']], function(){
    
    // =========================================================================
    // kumpulan route nilaiSiswa

    // Route::get('/nilaiSiswa/search', 'nilaiSiswaController@search');


    // Route::get('/search','nilaiSiswaController@search');

    Route::post('/nilaiSiswa/create2', 'nilaiSiswaController@create2');
    
    Route::post('/nilaiSiswa', 'nilaiSiswaController@store');
    
    Route::get('/nilaiSiswa/{idRef}/{tahunAjaran_id}/{semester}/{mapel_id}/{kelas_id}/edit', 'nilaiSiswaController@edit');

    Route::put('/nilaiSiswa', 'nilaiSiswaController@update');

    Route::delete('/nilaiSiswa/{idRef}', 'nilaiSiswaController@destroy');

    // =========================================================================
    // kumpulan route daftar nilai
    Route::get('/daftarNilai', 'nilaiSiswaController@showAll');

    Route::get('/daftarNilai/search-web', 'nilaiSiswaController@searchWeb');

    Route::get('/daftarNilai/search-android', 'nilaiSiswaController@searchAndroid');

    // =========================================================================
    // kumplan route nilai rapor
    Route::get('/nilaiRapor', 'nilaiRaporController@index');
    
    Route::post('/nilaiRapor/create', 'nilaiRaporController@create');

    Route::post('/nilaiRapor', 'nilaiRaporController@store');
    
    Route::get('/nilaiRapor/{id}/{idTahunAjaran}/{semester}/{idKelas}/{idSiswa}/edit', 'nilaiRaporController@edit');

    Route::put('/nilaiRapor/{id}', 'nilaiRaporController@update');

    Route::delete('/nilaiRapor/{id}', 'nilaiRaporController@destroy');
    
    Route::get('/nilaiRapor/dropdownlist/getSiswa/{kelas}','nilaiRaporController@getSiswa');
    
    // route ini untuk endependent dropdown kelas siswa pada nilai rapor yang digunakan pada ajax
    Route::get('/dropdownlist/getSiswa/{kelas}','nilaiRaporController@getSiswa');

    // =========================================================================
    // kumpulan Route Guru

    Route::get('/cetakRapor', 'cetakRaporController@index');

    Route::post('/daftarCetakRapor', 'cetakRaporController@daftarCetak');

    Route::post('/rapor', 'cetakRaporController@showRapor');
});



// group Route Guru ,siswa
Route::group(['middleware' => ['CekLoginMiddleware:guru,siswa']], function(){
    // =========================================================================
    // kumpulan route nilaSiswa
    Route::get('/nilaiSiswa', 'nilaiSiswaController@index');
});



// Ggup Route Siswa
Route::group(['middleware' => ['CekLoginMiddleware:siswa']], function(){

    // =========================================================================
    // route nilaiSiswa
    Route::post('/nilaiTampil', 'nilaiSiswaController@nilaiTampil');
});




Route::get('/testing', function() {
    return view('testing.testing');
});

Route::get('/testing2', function() {
    return view('testing.testing2');
});

Route::post('/testing', 'KkmController@testing');