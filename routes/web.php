<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserHouseController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\RequestController as AdminRequestController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\HouseRequestController;

// Routes pour les visiteurs
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Routes pour les comptes utilisateurs
Route::group(['prefix' => 'account'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', [LoginController::class, 'index'])->name('account.login');
        Route::get('register', [LoginController::class, 'register'])->name('account.register');
        Route::post('process-register', [LoginController::class, 'processRegister'])->name('account.processregister');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('logout', [LoginController::class, 'logout'])->name('account.logout');
        Route::get('dashboard', [UserHouseController::class, 'index'])->name('account.dashboard');
        Route::get('/user/houses', [UserHouseController::class, 'index'])->name('user.houses');
        Route::get('user/requests', [HouseRequestController::class, 'userRequests'])->name('user.requests');
    });
});

// Routes pour les maisons
Route::resource('houses', HouseController::class);
Route::get('user/house-requests/create/{houseId}', [HouseRequestController::class, 'create'])->name('houses.request');
Route::post('user/house-requests', [HouseRequestController::class, 'store'])->name('house_requests.store');

// Routes pour les administrateurs
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

        Route::get('requests', [AdminRequestController::class, 'index'])->name('requests.index');
        Route::post('requests/{id}/update-status', [AdminRequestController::class, 'updateStatus'])->name('requests.updateStatus');

        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });
});
