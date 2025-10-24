<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentAdvisorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');
// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Role-based Dashboard Routes
Route::middleware(['auth'])->group(function () {
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/manager/dashboard', [ManagerController::class, 'dashboard'])->name('manager.dashboard');
    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
});


// TODO : nanti per role masing2 ada job nya, pisahin routenya biar rapi , group per-role
Route::middleware(['auth'])->group(function () {
    Route::get('/student-advisor/dashboard', [StudentAdvisorController::class, 'dashboard'])->name('student-advisor.dashboard');
    Route::get('/student-advisor/trial', [StudentAdvisorController::class, 'formTrial'])->name('student-advisor.trial');
    Route::post('/student-advisor/trial', [StudentAdvisorController::class, 'store'])->name('student-advisor.trial.save');
    Route::put('/student-advisor/{id}/trial-status', [StudentAdvisorController::class, 'updateStatusTrial'])->name('student-advisor.trial.update');
    Route::put('/student-advisor/{id}/reschedule', [StudentAdvisorController::class, 'rescheduleDate'])->name('student-advisor.trial.reschedule');
});
