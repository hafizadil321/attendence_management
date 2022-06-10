<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EmployeeController;

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

Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'role:superadministrator']], function(){
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/employees', [EmployeeController::class, 'employees'])->name('employees');
    Route::post('/add_employee', [EmployeeController::class, 'add_employee'])->name('add_employee');
    Route::post('/get_employee', [EmployeeController::class, 'get_employee'])->name('get_employee');
    Route::post('/update_employee', [EmployeeController::class, 'update_employee'])->name('update_employee');
    Route::post('/delete_employee', [EmployeeController::class, 'delete_employee'])->name('delete_employee');
    Route::get('/test', [EmployeeController::class, 'test'])->name('test');
});