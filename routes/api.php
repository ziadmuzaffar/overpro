<?php

use App\Http\Controllers\API\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('//create', [ReportController::class, 'create']);

Route::controller(ReportController::class)->group(function () {
    Route::prefix('students/reports')->group(function () {
        Route::get('create', 'create');
    });
});