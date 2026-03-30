<?php
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

// All routes require the user to be logged in
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Books CRUD
    Route::resource('books', BookController::class)->except(['show']);

    // Members CRUD
    Route::resource('members', MemberController::class)->except(['show']);

    // Borrow Transactions
    Route::resource('borrows', BorrowController::class)->only(['index', 'create', 'store']);
    Route::patch('borrows/{borrow}/return', [BorrowController::class, 'returnBook'])
          ->name('borrows.return');

    // Reports
    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('reports/pdf', [ReportController::class, 'downloadPdf'])->name('reports.pdf');

});

require __DIR__.'/auth.php';