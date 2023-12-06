<?php

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

Route::get('login', [App\Http\Controllers\RegisterController::class, 'index']);
Route::post('store-login', [App\Http\Controllers\RegisterController::class, 'store']);
Route::get('logout', [App\Http\Controllers\RegisterController::class, 'logout']);

Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('menu', [App\Http\Controllers\MenuController::class, 'index']);
Route::post('store-menu', [App\Http\Controllers\MenuController::class, 'store']);
Route::post('update-menu', [App\Http\Controllers\MenuController::class, 'update']);
Route::post('delete-menu', [App\Http\Controllers\MenuController::class, 'delete']);

Route::get('pesanan', [App\Http\Controllers\PesananController::class, 'index']);
Route::get('riwayat-pesanan', [App\Http\Controllers\PesananController::class, 'riwayat']);
Route::get('add-pesanan', [App\Http\Controllers\PesananController::class, 'create']);
Route::post('store-pesanan', [App\Http\Controllers\PesananController::class, 'store']);
Route::post('store-detail', [App\Http\Controllers\PesananController::class, 'detail']);
Route::post('edit-detail', [App\Http\Controllers\PesananController::class, 'update']);
Route::post('delete-detail', [App\Http\Controllers\PesananController::class, 'delete']);
Route::get('pay-pesanan/{id}', [App\Http\Controllers\PesananController::class, 'pay']);
Route::get('cetak-struk/{id}/{kembalian}', [App\Http\Controllers\PesananController::class, 'struk']);
Route::post('bayar-tunai', [App\Http\Controllers\PesananController::class, 'tunai']);

// Route::get('/', function () {
//     return view('welcome');
// });