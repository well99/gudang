<?php

use App\Http\Controllers\Barang;
use App\Http\Controllers\Jenis_barang;
use App\Http\Controllers\TransaksiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('barang', [Barang::class, 'index_api']);
Route::get('jenis', [Jenis_barang::class, 'index_api']);
Route::post('byidjenis', [Barang::class, 'getByKategori_api']);
Route::post('barangbyid', [Barang::class, 'getBarangById_api']);
Route::get('barangbyid/{id}', [TransaksiController::class, 'detail_barang']);
