<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::middleware(['auth','check.role:admin,user'])->group(function () {
    Route::controller(LandingController::class)->group(function () {
        Route::get('/landing', 'index')->name('landing.index');
        Route::post('/scrape', 'scrapeData')->name('landing.scrape');
        Route::get('/detail/{id}', 'detail')->name('landing.detail');
        Route::get('/hasil', 'hasil')->name('landing.hasil');
        Route::post('/tambah', 'tambah')->name('landing.tambah');
        Route::get('/cart', 'cart')->name('landing.cart');
        Route::get('/history', 'history')->name('landing.history');
    });
});
// Rute Landing


//Routing Admin Menu Tiket Pesanan
Route::middleware(['auth','check.role:admin'])->group(function () {
    Route::controller(PesananController::class)->group(function () {
        Route::get('pesanan_add', 'create')->name('pesanan.create');
        Route::post('pesanan_store', 'store')->name('pesanan.store');
        Route::get('/pesanan', 'index')->name('pesanan.index');
        Route::get('pesanan_edit/{id}', 'edit')->name('pesanan.edit');
        Route::post('pesanan_update/{id}', 'update')->name('pesanan.update');
        Route::post('pesanan_delete/{id}', 'delete')->name('pesanan.delete');
        Route::post('pesanan_tolak/{id}', 'tolak')->name('pesanan.tolak');
    });

    //Routing User Menu Kelola Pelanggan
    Route::controller(UserController::class)->group(function () {
        Route::get('user_add', 'create')->name('user.create');
        Route::post('user_store', 'store')->name('user.store');
        Route::get('/user', 'index')->name('user.index');
        Route::get('user_edit/{id}', 'edit')->name('user.edit');
        Route::post('user_update/{id}', 'update')->name('user.update');
        Route::post('user_delete/{id}', 'delete')->name('user.delete');
    });
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login.post');
    Route::post('/logout', 'logout')->name('logout');
});
