<?php

use App\Http\Controllers\Web\Owner\EmployeeController;
use App\Http\Controllers\Web\Owner\ReportController;
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

Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');


Route::get('/reports', [ReportController::class, 'index'])->name('report');
Route::get('/reports/employee/{userId}', [ReportController::class, 'employeeReport'])->name('report.employee');
