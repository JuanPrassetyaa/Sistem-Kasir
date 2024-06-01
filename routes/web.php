<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProdukController;





Route::middleware(['guest'])->group(function(){
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.login');
});

Route::middleware(['UserAkses:admin'])->group(function(){
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/pembelian', [AdminController::class, 'pembelian'])->name('pembelian');

Route::post('/create-users', [AuthController::class, 'store'])->name('user.store');
Route::delete('/user-delete/{id}', [AuthController::class, 'destroy'])->name('user.delete');
Route::post('/create-product', [ProdukController::class, 'store'])->name('produk.store');
Route::delete('/produk-delete/{id}', [ProdukController::class, 'destroy'])->name('produk.delete');
Route::put('/produk-update/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::get('/export-penjualan', [AdminController::class, 'excel'])->name('excel.penjualan');
});

// PETUGAS
Route::middleware(['UserAkses:petugas'])->group(function(){
Route::get('/dashboard-petugas', [PetugasController::class, 'dashboard'])->name('dashboard-petugas');

Route::get('/struk/{penjualan_id}', [PetugasController::class, 'struk'])->name('struk');
Route::get('/penjualan', [PetugasController::class, 'penjualan'])->name('penjualan');
Route::post('/create-penjualan', [PetugasController::class, 'store'])->name('penjualan.store');
Route::put('/pelanggan-update/{id}', [PetugasController::class, 'update'])->name('pelanggan.update');

});




Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
