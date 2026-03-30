<?php
use App\Http\Controllers\LostItemController;
use App\Http\Controllers\ClaimController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReporterController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

// All routes require the user to be logged in
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Lost Items CRUD
    Route::resource('lost-items', LostItemController::class)->except(['show']);

    // Reporters CRUD
    Route::resource('reporters', ReporterController::class)->except(['show']);

    // Claims
    Route::resource('claims', ClaimController::class)->only(['index', 'create', 'store']);
    Route::patch('claims/{claim}/collect', [ClaimController::class, 'collectClaim'])
          ->name('claims.collect');

    // Reports
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('reports/pdf', [ReportController::class, 'downloadPdf'])->name('reports.pdf');

});

require __DIR__.'/auth.php';