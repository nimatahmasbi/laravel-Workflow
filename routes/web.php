<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\WorkflowController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Departments - Only managers and admins
    Route::middleware(['role:manager'])->group(function () {
        Route::resource('departments', DepartmentController::class);
    });
    
    // Workflows - Only supervisors, managers and admins
    Route::middleware(['role:supervisor'])->group(function () {
        Route::resource('workflows', WorkflowController::class);
    });
    
    // Tasks - Only supervisors, managers and admins
    Route::middleware(['role:supervisor'])->group(function () {
        Route::resource('tasks', TaskController::class);
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
