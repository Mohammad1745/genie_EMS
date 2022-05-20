<?php

use App\Http\Controllers\Web\Owner\EmployeeController;
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

Route::get('/employees', [EmployeeController::class, 'index'])->name('employee');


Route::get('/reports', function(){
    return 'Reports';
})->name('report');
