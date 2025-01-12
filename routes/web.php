<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () { return view('auth.login');})->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
