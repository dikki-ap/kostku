<?php

use App\Http\Controllers\DashboardCategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardGalleriesController;
use App\Http\Controllers\DashboardKostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    return view('index', [
        "title" => "Home"
    ]);
});

// Login & Logout
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

// Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Dashboard
Route::resource('/dashboard', DashboardController::class)->middleware('auth')->except(['create', 'show', 'store', 'update', 'destroy']);

// Dashboard Kost
Route::resource('/dashboard/kosts', DashboardKostController::class)->middleware('auth');

// Dashboard Category
Route::resource('/dashboard/categories', DashboardCategoryController::class)->middleware('auth')->except('show');

// Dashboard Gallery
Route::resource('/dashboard/galleries', DashboardGalleriesController::class)->middleware('auth');