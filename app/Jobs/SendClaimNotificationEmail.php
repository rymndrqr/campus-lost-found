<?php
namespace App\Jobs;

use App\Mail\ClaimNotificationMail;
use App\Models\ClaimRecord;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendClaimNotificationEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public ClaimRecord $claimRecord) {}

    public function handle(): void
    {
        Mail::to($this->claimRecord->reporter->email)
            ->send(new ClaimNotificationMail($this->claimRecord));
    }
}
?>
