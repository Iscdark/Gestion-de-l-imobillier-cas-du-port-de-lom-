<?php

use App\Http\Controllers\dashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserHouseController;
use App\Http\Controllers\admin\loginController as AdminLoginController ;
use App\Http\Controllers\admin\dashboardController as AdminDashboardController ;
use App\Http\Controllers\HouseRequestController;



Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::group(['prefix' => 'account'],function(){

    //guest middleware
    Route::group(['middleware' => 'guest'],function(){
        Route::get('login', [LoginController::class,'index'])->name('account.login');
        Route::get('register', [LoginController::class,'register'])->name('account.register');
        Route::post('process-register', [LoginController::class,'ProcessRegister'])->name('account.processregister');
        Route::post('authenticate', [LoginController::class,'authenticate'])->name('account.authenticate');
    
    });
    
    Route::group(['middleware' => 'auth'],function(){
        Route::get('logout', [LoginController::class,'logout'])->name('account.logout');
        Route::get('dashboard', [DashboardController::class,'index'])->name('account.dashboard');
        Route::get('/user/houses', [UserHouseController::class, 'index'])->name('account.dashboard');
           
    });
   

});
// route for houses 
Route::resource('houses', HouseController::class);
Route::get('user/house-requests/create/{houseId}', [HouseRequestController::class, 'create'])->name('houses.request');
Route::post('user/house-requests', [HouseRequestController::class, 'store'])->name('house_requests.store');



Route::group(['prefix' => 'admin'],function(){

    //guest middleware
    Route::group(['middleware' => 'admin.guest'],function(){
        Route::get('login', [AdminLoginController::class,'index'])->name('admin.login');
        Route::post('authenticate', [AdminLoginController::class,'authenticate'])->name('admin.authenticate');

    });
    
    Route::group(['middleware' => 'admin.auth'],function(){
        Route::get('dashboard', [adminDashboardController::class,'index'])->name('admin.dashboard');
        Route::post('logout', [AdminLoginController::class,'logout'])->name('admin.logout');

    });

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
   

});