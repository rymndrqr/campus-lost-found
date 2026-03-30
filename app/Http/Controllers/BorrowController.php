<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowRecord;
use App\Models\Member;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = BorrowRecord::with(['book', 'member'])->latest()->paginate(10);
        return view('borrows.index', compact('borrows'));
    }

    public function create()
    {
        $books   = Book::where('available_copies', '>', 0)->get();
        $members = Member::all();
        return view('borrows.create', compact('books', 'members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id'    => 'required|exists:books,id',
            'member_id'  => 'required|exists:members,id',
            'borrowed_at' => 'required|date',
            'due_date'   => 'required|date|after:borrowed_at',
        ]);

        // Creating this record fires BorrowRecordObserver@created automatically
        BorrowRecord::create([
            'book_id'    => $request->book_id,
            'member_id'  => $request->member_id,
            'borrowed_at' => $request->borrowed_at,
            'due_date'   => $request->due_date,
            'status'     => 'borrowed',
        ]);

        return redirect()->route('borrows.index')
            ->with('success', 'Book borrowed! Confirmation email queued.');
    }

    // Custom method to mark a book as returned
    public function returnBook(BorrowRecord $borrow)
    {
        // This update fires BorrowRecordObserver@updated automatically
        $borrow->update([
            'status'      => 'returned',
            'returned_at' => now()->toDateString(),
        ]);
        return redirect()->route('borrows.index')
            ->with('success', 'Book returned successfully!');
    }
}