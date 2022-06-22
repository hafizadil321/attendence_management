<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\UserController;

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


date_default_timezone_set('America/New_York');
Route::get('/', [HomeController::class, 'adminLoginForm']);

Auth::routes();
Route::post('/attendance', [EmployeeController::class, 'attendance'])->name('attendance');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'role:superadministrator']], function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::get('/addUser', [UserController::class, 'add_user_view']);
    Route::post('/create_user', [UserController::class, 'create_user'])->name('create_user');
    Route::post('/get_employee', [EmployeeController::class, 'get_employee'])->name('get_employee');
    Route::post('/update_employee', [EmployeeController::class, 'update_employee'])->name('update_employee');
    Route::post('/delete_employee', [EmployeeController::class, 'delete_employee'])->name('delete_employee');
    Route::get('/test', [EmployeeController::class, 'test'])->name('test');

    // Employee Attendance
    Route::get('/attendance/{id}', [EmployeeController::class, 'employee_attendance']);

});