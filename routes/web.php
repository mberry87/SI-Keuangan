<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TransaksiController;
use App\Models\Kategori;
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

// Default Route
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('backend/dashboard');
// });

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

// kategori
Route::get('/kategori/index', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::get('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

// transaksi
Route::get('/transaksi/index', [TransaksiController::class, 'index'])->name('transaksi.index');
Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('transaksi.create');
Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit'])->name('transaksi.edit');
Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::put('/transaksi/{id}', [TransaksiController::class, 'update'])->name('transaksi.update');
Route::get('/transaksi/{id}', [TransaksiController::class, 'destroy'])->name('transaksi.destroy');

// laporan
Route::get('/laporan/index', [LaporanController::class, 'index'])->name('laporan.index');

// fiter
Route::get('/filter', [LaporanController::class, 'filter'])->name('filter');
