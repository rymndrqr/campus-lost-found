<?php
namespace App\Mail;

use App\Models\ClaimRecord;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ClaimNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ClaimRecord $claimRecord) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Claim Notification - Campus Lost & Found',
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.claim-notification',
        );
    }
}
?>
