<?php
namespace App\Models;

use App\Observers\ClaimRecordObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

// Observer registered in AppServiceProvider
class ClaimRecord extends Model
{
    protected $fillable = [
        'lost_item_id', 'reporter_id', 'claimant_name',
        'claimant_email', 'claimant_phone', 'reported_date',
        'claimed_date', 'status'
    ];

    protected $casts = [
        'reported_date' => 'date',
        'claimed_date' => 'date',
    ];

    public function lostItem()
    {
        return $this->belongsTo(LostItem::class);
    }

    public function reporter()
    {
        return $this->belongsTo(Reporter::class);
    }
}
?>
