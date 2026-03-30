<?php
namespace App\Http\Controllers;

use App\Models\LostItem;
use App\Models\ClaimRecord;
use App\Models\Reporter;

class DashboardController extends Controller
{
    public function index()
    {
$totalLostItems = LostItem::count();
        $totalReporters  = Reporter::count();
        $unclaimedCount  = LostItem::where('unclaimed', true)->count();
        $pendingClaims   = ClaimRecord::where('status', 'reported')->count();
        $recentClaims = ClaimRecord::with(['lostItem', 'reporter'])
                            ->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalLostItems', 'totalReporters', 'unclaimedCount', 'pendingClaims', 'recentClaims'
        ));
    }
}