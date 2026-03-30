<?php
namespace App\Jobs;

use App\Mail\BorrowConfirmationMail;
use App\Models\BorrowRecord;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendBorrowConfirmationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public BorrowRecord $borrowRecord) {}

    /**
     * Execute the job — sends the email in the background.
     */
    public function handle(): void
    {
        Mail::to($this->borrowRecord->member->email)
            ->send(new BorrowConfirmationMail($this->borrowRecord));
    }
}