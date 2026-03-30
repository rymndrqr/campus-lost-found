<?php
namespace App\Observers;

use App\Jobs\SendClaimNotificationEmail;
use App\Models\ClaimRecord;

class ClaimRecordObserver
{
    public function created(ClaimRecord $claimRecord): void
    {
        // Auto-mark item as claimed
        $claimRecord->lostItem->update(['unclaimed' => false]);

        // Queue notification email
        SendClaimNotificationEmail::dispatch($claimRecord);
    }

    public function updated(ClaimRecord $claimRecord): void
    {
        if ($claimRecord->wasChanged('status') && $claimRecord->status === 'collected') {
            // Optional: additional logic for collected status
        }
    }
}
?>
