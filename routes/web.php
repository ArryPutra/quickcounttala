<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KelolaSuaraController;
use App\Http\Controllers\Admin\KelolaTpsController;
use App\Http\Controllers\Authenticate\LoginController;
use App\Http\Controllers\Authenticate\LogoutController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index'])
    ->name('index');

Route::get('/login', [LoginController::class, 'index'])
    ->name('login');
Route::middleware('guest')->group(function () {
    Route::post('/login', [LoginController::class, 'login'])
        ->name('login');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout'])
        ->name('logout');

    // Route::get('/admin/dashboard', [DashboardController::class, 'index'])
    //     ->name('admin.dashboard');
    Route::resource('/admin/kelola-suara', KelolaSuaraController::class);
});

Route::get('/{kecamatan}', [IndexController::class, 'index']);
Route::get('/{kecamatan}/{kelurahan}', [IndexController::class, 'index']);
Route::get('/{kecamatan}/{kelurahan}/{tps}', [IndexController::class, 'index']);