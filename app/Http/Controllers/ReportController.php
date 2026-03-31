<?php
namespace App\Http\Controllers;

use App\Models\ClaimRecord;
use Spatie\LaravelPdf\Facades\Pdf;

class ReportController extends Controller
{
    public function index()
    {
        $records = ClaimRecord::with(['lostItem', 'reporter'])->latest()->get();
        return view('reports.index', compact('records'));
    }

    public function downloadPdf()
    {
        $records = ClaimRecord::with(['lostItem', 'reporter'])->latest()->get();

        return Pdf::view('reports.pdf', compact('records'))
->name('claim-report.pdf')
                   ->download();
    }
}