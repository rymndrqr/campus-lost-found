<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LostItem extends Model
{
    protected $fillable = [
        'item_name', 'description', 'category',
        'location_found', 'date_found', 'unclaimed'
    ];

    protected $casts = [
        'date_found' => 'date',
        'unclaimed' => 'boolean',
    ];

    public function claimRecords()
    {
        return $this->hasMany(ClaimRecord::class);
    }
}
?>
