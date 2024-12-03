<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PoliController;
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

Route::get('/', function () {
    return view('welcome');
});

//admin
Route::get('/admin-login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin-login', [AdminController::class, 'authenticate'])->name('login');

//admin
Route::middleware(['check_user_login:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin-logout', [AdminController::class, 'logout'])->name('admin.logout');

    //poli
    Route::get('/poli', [PoliController::class, 'index'])->name('admin.poli');
    Route::post('/poli', [PoliController::class, 'store'])->name('admin.poli.store');
    Route::patch('/poli/{poli}', [PoliController::class, 'update'])->name('admin.poli.update');
    Route::delete('/poli/{poli}', [PoliController::class, 'destroy'])->name('admin.poli.destroy');

    //dokter
    Route::get('/dokter', [DokterController::class, 'index'])->name('admin.dokter');
    Route::post('/dokter', [DokterController::class, 'store'])->name('admin.dokter.store');
    Route::patch('/dokter/{dokter}', [DokterController::class, 'update'])->name('admin.dokter.update');
    Route::delete('/dokter/{dokter}', [DokterController::class, 'destroy'])->name('admin.dokter.destroy');

});

//dokter
Route::middleware(['check_user_login:dokter'])->prefix('dokter')->group(function () {
    Route::get('/login', [DokterController::class, 'login'])->name('dokter.login');
    Route::get('/dashboard', [DokterController::class, 'index'])->name('dokter.dashboard');
});

//pasien
Route::middleware(['check_user_login:pasien'])->prefix('pasien')->group(function () {
    Route::get('/login', [PasienController::class, 'login'])->name('pasien.login');
    Route::get('/dashboard', [PasienController::class, 'index'])->name('pasien.dashboard');
});


