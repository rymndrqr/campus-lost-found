<?php
namespace App\Observers;

use App\Jobs\SendBorrowConfirmationEmail;
use App\Models\BorrowRecord;

class BorrowRecordObserver
{
    /**
     * Fires when a new borrow record is CREATED.
     * Decrements available copies and queues a confirmation email.
     */
    public function created(BorrowRecord $borrowRecord): void
    {
        // Automatically decrement book's available copies
        $borrowRecord->book->decrement('available_copies');

        // Dispatch email notification to the queue
        SendBorrowConfirmationEmail::dispatch($borrowRecord);
    }

    /**
     * Fires when a borrow record is UPDATED.
     * Increments available copies when book is returned.
     */
    public function updated(BorrowRecord $borrowRecord): void
    {
        // Check if status just changed to 'returned'
        if ($borrowRecord->wasChanged('status') && $borrowRecord->status === 'returned') {
            $borrowRecord->book->increment('available_copies');
        }
    }
}