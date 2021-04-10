<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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
    return view('auth.login');
})->middleware('AlreadyLoggedIn');

Route::get('/login', [AuthController::class, 'view_login'])->name('login')->middleware('AlreadyLoggedIn');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/companies/fetch_data', [CompanyController::class, 'fetch_data'])->name('companies.fetch_data');

Route::post('check', [AuthController::class, 'check_employee'])->name('auth.login');
Route::get('navbar', [AuthController::class, 'navbar'])->name('layouts.navbar.topbar');
Route::get('/employee', [AuthController::class, 'employee_profile'])->name('employees.index')->middleware('employeeLoggedIn');
Route::get('/company', [AuthController::class, 'company_profile'])->name('companies.index')->middleware('employeeLoggedIn');



Route::get('/employeecontroller/fetch_specific_employee_in_company', [EmployeeController::class, 'fetch_specific_employee_in_company'])->name('employee.fetch_specific_employee_in_company')->middleware('employeeLoggedIn');


