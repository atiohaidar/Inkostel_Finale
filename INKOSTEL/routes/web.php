<?php

use App\Http\Controllers\KosController;
use App\Http\Controllers\SimpanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailKontroler;
use App\Http\Controllers\LoginRegis;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\JualController;

use App\Http\Controllers\CariKosController;
//use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('index');
})->name('home');

//Login and Registration
Route::get('/login', [LoginRegis::class, 'login'])->name('login');
Route::post('/login', [LoginRegis::class, 'loginPost'])->name('loginPost');
Route::post('/registration', [LoginRegis::class, 'registrationPost'])->name('registration.post');



// Cari Kost
Route::get('/carikost', [CariKosController::class, 'index']);






//Simpan Kost
Route::get('/simpan', [SimpanController::class, 'tampilkanHalamanSimpan'])->name('simpan.halaman');
Route::delete('/kos/delete/{id}', [SimpanController::class, 'delete'])->name('kos.delete');
//akhir simpan kost

Route::get('/profile', function () {
    return view('profile');
});
Route::get('/detailkos/{Detail}', [DetailKontroler::class, 'show'])->name('detailkos.show');

//jual Kos
Route::get('/jualkos', [JualController::class, 'tampilregisjual']);
Route::post('/jualkos', [JualController::class, 'prosesregisjual']);



//LayOut --> Hapus saat versi final

Route::get('/layout', function () {
    return view('layout');
});

Route::get('/navbar', function () {
    return view('partial.navbar');
});

Route::get('/footer', function () {
    return view('partial.footer');
});

Route::get('/val', function () {
    return view('validasi');
});

Route::get('/acc', function () {
    return view('accept');
});
