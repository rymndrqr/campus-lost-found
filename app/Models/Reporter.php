<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reporter extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'dorm'];

    public function claimRecords()
    {
        return $this->hasMany(ClaimRecord::class);
    }
}
?>
