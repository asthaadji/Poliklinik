<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
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

Route::middleware(['auth'])->group(function () {
    //admin
    Route::middleware(['check_user_login:admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::post('/admin-logout', [AdminController::class, 'logout'])->name('admin.logout');
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
});

