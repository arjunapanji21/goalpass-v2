<?php


use App\Http\Controllers\AdminAskotController;
use App\Http\Controllers\AdminAsprovController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KlubController;
use App\Http\Controllers\KotaController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UsiaController;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/', [MainController::class, 'landing_page'])->name('landing_page');

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/auth', [AuthController::class, 'auth'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/cekdata/{kd_kartu}', [MainController::class, 'cekKartu'])->name('anggota.cekdata');

Route::middleware('auth')->group(function () {
    Route::prefix('in')->group(function () {
        Route::get('/beranda', [MainController::class, 'beranda'])->name('beranda');
        Route::get('/anggota', [MainController::class, 'anggota'])->name('anggota');
        Route::get('/anggota/create', [MainController::class, 'anggota_create'])->name('anggota.create');
        Route::post('/anggota/store', [MainController::class, 'anggota_store'])->name('anggota.store');

        Route::get('/get/klub/{kota_id}', [MainController::class, 'get_klub_by_location'])->name('get.klub');

        Route::get('/anggota/{kd_kartu}', [MainController::class, 'anggota_profile'])->name('anggota.profile');
        Route::get('/anggota/cetak/{kd_kartu}', [MainController::class, 'cetakKartu'])->name('anggota.cetak');

        Route::middleware('super_admin')->group(function () {
            Route::get('/admin', [MainController::class, 'admin'])->name('admin');
            Route::resource('/admin/asprov', AdminAsprovController::class);
            Route::resource('/admin/askot', AdminAskotController::class);
            Route::resource('/master/klub', KlubController::class);
            Route::resource('/master/kota', KotaController::class);
        });
    });

    Route::prefix('user')->group(function () {
        // Route::get('/beranda', [MainController::class, 'beranda'])->name('beranda');
        // Route::get('/anggota', [MainController::class, 'anggota'])->name('anggota');
        // Route::get('/anggota/baru', [MainController::class, 'anggota_tambah'])->name('tambah_anggota');
        // Route::get('/admin', [MainController::class, 'admin'])->name('admin');
    });
});
