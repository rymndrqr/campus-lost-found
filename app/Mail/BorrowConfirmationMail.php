<?php
namespace App\Mail;

use App\Models\BorrowRecord;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BorrowConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public BorrowRecord $borrowRecord) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Book Borrowing Confirmation - Library System',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.borrow-confirmation',
        );
    }
}