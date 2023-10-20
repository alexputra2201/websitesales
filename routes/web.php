<?php

use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;

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



// Route::middleware(['auth'])->group(function () {
//     Route::get('/transaksi', [TransaksiController::class, 'index']);
//     Route::get('/transaksi/create', [TransaksiController::class, 'create']);
//     Route::post('/transaksi', [TransaksiController::class, 'store']);
//     Route::get('/transaksi/{id}/edit', [TransaksiController::class, 'edit']);
//     Route::put('/transaksi/{id}', [TransaksiController::class, 'update']); 
// });
Route::resource('/transaksi', TransaksiController::class);



Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/registrasi', [RegistrasiController::class, 'index'])->middleware('guest');
Route::post('/registrasi', [RegistrasiController::class, 'store']);