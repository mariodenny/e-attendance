<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Role-based Dashboard Routes
// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
//     Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//     Route::get('/manager/dashboard', [ManagerController::class, 'dashboard'])->name('manager.dashboard');
//     Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
// });
