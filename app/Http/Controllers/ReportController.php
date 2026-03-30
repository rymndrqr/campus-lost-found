<?php
namespace App\Http\Controllers;

use App\Models\BorrowRecord;
use Spatie\LaravelPdf\Facades\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        $records = BorrowRecord::with(['book', 'member'])->latest()->get();
        return view('reports.index', compact('records'));
    }

    public function downloadPdf()
    {
        $records = BorrowRecord::with(['book', 'member'])->latest()->get();

        return Pdf::view('reports.pdf', compact('records'))
                   ->name('borrow-report.pdf')
                   ->download();
    }
}