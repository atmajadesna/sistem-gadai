<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Newskelompok15;
use App\Http\Controllers\Nasabah060Controller;
use App\Http\Controllers\Barang046Controller;
use App\Http\Controllers\AuthController;

// Beranda 
Route::get('/', function () {
    $totalNasabah = \App\Models\nasabahmodel::count();
    $totalGadai   = \App\Models\BarangModel::count();
    return view('beranda', compact('totalNasabah', 'totalGadai'));
});

// ==== Nasabah 
Route::get('/nasabah',        [Nasabah060Controller::class, 'index'])->middleware('cekakses:nasabah');
Route::get('/desna060',       [Nasabah060Controller::class, 'index'])->middleware('cekakses:nasabah');
Route::post('/save_data',     [Nasabah060Controller::class, 'post060'])->middleware('cekakses:nasabah');
Route::get('/edit_data/{id}', [Nasabah060Controller::class, 'edit'])->middleware('cekakses:nasabah');
Route::put('/update_data/{id}', [Nasabah060Controller::class, 'update'])->middleware('cekakses:nasabah');
Route::delete('/delete_data/{id}', [Nasabah060Controller::class, 'destroy'])->middleware('cekakses:nasabah');

// ==== Barang / Gadai 
Route::get('/gadai',           [Barang046Controller::class, 'index'])->middleware('cekakses:gadai');
Route::post('/simpan_data',    [Barang046Controller::class, 'post'])->middleware('cekakses:gadai');
Route::get('/edit_gadai/{id}', [Barang046Controller::class, 'edit'])->middleware('cekakses:gadai');
Route::put('/update_gadai/{id}', [Barang046Controller::class, 'update'])->middleware('cekakses:gadai');
Route::delete('/delete_gadai/{id}', [Barang046Controller::class, 'destroy'])->middleware('cekakses:gadai');

// ==== Laporan & Halaman lain 
Route::get('/laporan',    [Newskelompok15::class, 'laporan'])->middleware('ceklogin');

// ==== Login / Logout 
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);