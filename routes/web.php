<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AspirasiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('home', [
        'title' => 'Home',
    ]);
})->name('login');

//authentication
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

//aspirasi
Route::get('/aspirasi', [AspirasiController::class, 'index']);
Route::post('/aspirasi/store', [AspirasiController::class, 'store']);
Route::post('/aspirasi/search', [AspirasiController::class, 'search']);
Route::post('/aspirasi/feedback', [AspirasiController::class, 'feedback']);

//admin
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/history', [AdminController::class, 'history']);

Route::post('/admin/status', [AdminController::class, 'status'])->middleware('auth');
Route::post('/admin/hapus', [AdminController::class, 'delete'])->middleware('auth');
