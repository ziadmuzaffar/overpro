<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\ShareController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::fallback(fn() => redirect('login'));

Route::middleware('guest')->group(function () {
    Route::view('login', 'pages.auth.login')->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('universities', UniversityController::class);
    Route::resource('sections', SectionController::class);
    Route::resource('levels', LevelController::class);
    Route::resource('groups', GroupController::class);
    Route::resource('students', StudentController::class);
    Route::controller(AttendanceController::class)->group(function () {
        Route::prefix('attendances')->group(function () {
            Route::get('/', 'index')->name('attendances.index');
            Route::post('/show', 'show')->name('attendances.show');
            Route::post('/store', 'store')->name('attendances.store');
        });
    });
    Route::controller(ShareController::class)->group(function () {
        Route::prefix('shares')->group(function () {
            Route::get('/', 'index')->name('shares.index');
            Route::get('/show', 'show')->name('shares.show');
            Route::post('/store', 'store')->name('shares.store');
            Route::put('/update', 'update')->name('shares.update');
        });
    });
    Route::controller(ExamController::class)->group(function () {
        Route::prefix('exams')->group(function () {
            Route::get('/', 'index')->name('exams.index');
            Route::get('/show', 'show')->name('exams.show');
            Route::post('/store', 'store')->name('exams.store');
            Route::put('/update', 'update')->name('exams.update');
        });
    });
    Route::controller(ReportController::class)->group(function () {
        Route::prefix('reports')->group(function () {
            Route::get('/', 'index')->name('reports.index');
            Route::post('/show', 'show')->name('reports.show');
        });
    });
    Route::resource('users', UserController::class);
});