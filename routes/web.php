<?php

use App\Http\Controllers\Barang;
use App\Http\Controllers\Gudang;
use App\Http\Controllers\Jenis_barang;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/cek_login', [LoginController::class, 'cek_login']);
Route::get('/registrasi', [LoginController::class, 'registrasi']);
Route::post('regisUser', [UserController::class, 'regis'])->name('regisUser');
Route::get('/logout', [LoginController::class, 'logout']);
Route::resource('gudang', Gudang::class)->middleware(['auth', 'auth.session']);
Route::get('/gudang/edit/{id_gudang}', [Gudang::class, 'edit']);
Route::post('update', [Gudang::class, 'update'])->name('update');

Route::resource('user', UserController::class)->middleware('auth');
Route::post('userTambah', [UserController::class, 'store'])->name('usertambah');
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::post('userEdit', [UserController::class, 'update'])->name('useredit');

Route::resource('jenis', Jenis_barang::class)->middleware(['auth', 'auth.session']);
Route::get('/jenis/edit/{id_jenis_barang}', [Jenis_barang::class, 'edit']);
Route::post('updateJenis', [Jenis_barang::class, 'update'])->name('updateJenis');

Route::resource('barang', Barang::class)->middleware('auth');
Route::get('/barang/create', [Barang::class, 'create']);
Route::get('/barang/edit/{id_barang}', [Barang::class, 'edit']);
Route::post('/barang/store', [Barang::class, 'store'])->name('simpanbarang');
Route::post('editbarang', [Barang::class, 'update'])->name('editbarang');

Route::get('transaksi', [TransaksiController::class, 'index']);
// Route::resource('hitung', Coba::class);
