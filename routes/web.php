<?php

use App\Http\Controllers\AdminCompanyController;
use App\Http\Controllers\AdminDepartmentController;
use App\Http\Controllers\AdminEmployeeController;
use App\Http\Controllers\AdminSetupController;
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

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    // Company Route
    Route::get('/company',[AdminCompanyController::class,'index'])->name('company.index');
    Route::get('/company/create',[AdminCompanyController::class,'create'])->name('company.create');
    Route::post('/company/store',[AdminCompanyController::class,'store'])->name('company.store');

    // Employee Route
    Route::get('/employee',[AdminEmployeeController::class,'index'])->name('employee.index');
    Route::get('/employee/create',[AdminEmployeeController::class,'create'])->name('employee.create');
    Route::post('/employee/store',[AdminEmployeeController::class,'store'])->name('employee.store');

    //Department Route
    Route::get('/department',[AdminDepartmentController::class,'index'])->name('department.index');
    Route::get('/department/create',[AdminDepartmentController::class,'create'])->name('department.create');
    Route::post('/department/store',[AdminDepartmentController::class,'store'])->name('department.store');

     //Company - Employee - department Route
     Route::get('/setup',[AdminSetupController::class,'index'])->name('setup.index');
     Route::get('/setup/create',[AdminSetupController::class,'create'])->name('setup.create');
     Route::post('/setup/store',[AdminSetupController::class,'store'])->name('setup.store');

});



Route::get('/', function () {
    return view('task');
});

Route::get('/admin/adminPermision', function () {
    if(auth()->user()){
        auth()->user()->assignRole('admin');
    }
    return redirect()->route('company.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
