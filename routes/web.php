<?php

use App\Http\Controllers\direction\DGRequestController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserHouseController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\admin\RequestController as AdminRequestController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\direction\LoginController as DirectionLoginController;
use App\Http\Controllers\direction\DashboardController as DirectionDashboardController;
use App\Http\Controllers\service\LoginController as ServiceLoginController;
use App\Http\Controllers\service\ServiceController as ServiceDashboardController;
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
Route::get('user/house-requests/create/{houseId}', [HouseRequestController::class, 'create'])->name('houses.request');
Route::post('user/house-requests', [HouseRequestController::class, 'store'])->name('house_requests.store');

// Routes pour les administrateurs
Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware' => 'admin.auth'], function () {
        Route::resource('houses', HouseController::class);
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
        Route::get('users/activate/{id}', [UserController::class, 'activate'])->name('admin.users.activate');
        Route::get('users/deactivate/{id}', [UserController::class, 'deactivate'])->name('admin.users.deactivate');
        Route::get('users/active', [UserController::class, 'showActiveUsers'])->name('users.active');
        Route::get('users/inactive', [UserController::class, 'showInactiveUsers'])->name('users.inactive');
        Route::get('requests', [AdminRequestController::class, 'index'])->name('requests.index');
        Route::post('requests/{id}/update-status', [AdminRequestController::class, 'updateStatus'])->name('requests.updateStatus');
        Route::get('/admin/create-user', [AdminDashboardController::class, 'createUser'])->name('admin.createUser');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/admin/administrators', [AdminController::class, 'index'])->name('admin.administrators.index');
        Route::get('/admin/administrators/create', [AdminController::class, 'create'])->name('admin.administrators.create');
        Route::post('/admin/administrators', [AdminController::class, 'store'])->name('admin.administrators.store');
        Route::get('/admin/administrators/{id}/edit', [AdminController::class, 'edit'])->name('admin.administrators.edit');
        Route::put('/admin/administrators/{id}', [AdminController::class, 'update'])->name('admin.administrators.update');
        Route::delete('/admin/administrators/{id}', [AdminController::class, 'destroy'])->name('admin.administrators.destroy');
    });
});

// Routes pour les directions
Route::group(['prefix' => 'directions'], function () {
    Route::group(['middleware' => 'dg.guest'], function () {
        Route::get('login', [DirectionLoginController::class, 'index'])->name('direction.login');
        Route::post('authenticate', [DirectionLoginController::class, 'authenticate'])->name('direction.authenticate');
    });

    Route::group(['middleware' => 'dg.auth'], function () {
        Route::get('dashboard', [DirectionDashboardController::class, 'index'])->name('direction.dashboard');
    });
});

// Routes pour les services
Route::group(['prefix' => 'services'], function () {
    Route::group(['middleware' => 'service.guest'], function () {
        Route::get('login', [ServiceLoginController::class, 'index'])->name('service.login');
        Route::post('authenticate', [ServiceLoginController::class, 'authenticate'])->name('service.authenticate');
    });

    Route::group(['middleware' => 'service.auth'], function () {
        Route::get('dashboard', [ServiceDashboardController::class, 'index'])->name('service.dashboard');
        Route::get('validation-demandes', [RequestController::class, 'index'])->name('requests.validation');
    });
});
Route::get('/dg/requests', [DGRequestController::class, 'index'])->name('dg.requests.index');
Route::post('/dg/requests/{id}/approve', [DGRequestController::class, 'approve'])->name('dg.requests.approve');
Route::post('/dg/requests/{id}/reject', [DGRequestController::class, 'reject'])->name('dg.requests.reject');
// Routes pour les demandes
Route::prefix('requests')->middleware('auth')->group(function() {
    Route::post('{id}/approve', [RequestController::class, 'approve'])->name('requests.approve');
    Route::post('{id}/reject', [RequestController::class, 'reject'])->name('requests.reject');
});