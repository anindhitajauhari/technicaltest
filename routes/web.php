<?php

use App\Http\Controllers\PegawaiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [PegawaiController::class, 'index'])->name('pegawai');
Route::get('/tambahpegawai', [PegawaiController::class, 'tambahpegawai'])->name('tambahpegawai');
Route::post('/insertdata', [PegawaiController::class, 'insertdata'])->name('insertdata');
Route::get('/tampilkandata/{id}', [PegawaiController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}', [PegawaiController::class, 'updatedata'])->name('updatedata');
Route::get('/delete/{id}', [PegawaiController::class, 'delete'])->name('delete');
