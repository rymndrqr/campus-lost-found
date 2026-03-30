<?php
namespace App\Models;

use App\Observers\BorrowRecordObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([BorrowRecordObserver::class])]
class BorrowRecord extends Model
{
    protected $fillable = [
        'book_id', 'member_id', 'borrowed_at',
        'due_date', 'returned_at', 'status'
    ];

    protected $casts = [
        'borrowed_at' => 'date',
        'due_date'   => 'date',
        'returned_at' => 'date',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}