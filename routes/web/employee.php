<?php

use App\Http\Controllers\Web\Employee\DashboardController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/check_in', [DashboardController::class, 'checkIn'])->name('checkIn');
Route::get('/check_out', [DashboardController::class, 'checkOut'])->name('checkOut');

