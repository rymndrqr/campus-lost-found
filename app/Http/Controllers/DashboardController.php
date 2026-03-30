<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowRecord;
use App\Models\Member;

class DashboardController extends Controller
{
    public function index()
    {
        $totalBooks    = Book::count();
        $totalMembers  = Member::count();
        $activeBorrows = BorrowRecord::where('status', 'borrowed')->count();
        $overdueCount  = BorrowRecord::where('status', 'overdue')->count();
        $recentBorrows = BorrowRecord::with(['book', 'member'])
                            ->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalBooks', 'totalMembers', 'activeBorrows', 'overdueCount', 'recentBorrows'
        ));
    }
}