<?php
namespace App\Http\Controllers;

use App\Models\LostItem;
use App\Models\ClaimRecord;
use App\Models\Reporter;
use Illuminate\Http\Request;

class ClaimController extends Controller
{
    public function index()
    {
        $claims = ClaimRecord::with(['lostItem', 'reporter'])->latest()->paginate(10);
        return view('claims.index', compact('claims'));
    }

    public function create()
    {
        $lostItems = LostItem::where('unclaimed', true)->get();
        $reporters = Reporter::all();
        return view('claims.create', compact('lostItems', 'reporters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lost_item_id'     => 'required|exists:lost_items,id',
            'reporter_id'      => 'required|exists:reporters,id',
            'claimant_name'    => 'required|string|max:255',
            'claimant_email'   => 'required|email',
            'claimant_phone'   => 'required|string|max:20',
            'reported_date'    => 'required|date',
        ]);

        ClaimRecord::create([
            'lost_item_id'    => $request->lost_item_id,
            'reporter_id'     => $request->reporter_id,
            'claimant_name'   => $request->claimant_name,
            'claimant_email'  => $request->claimant_email,
            'claimant_phone'  => $request->claimant_phone,
            'reported_date'   => $request->reported_date,
            'status'          => 'reported',
        ]);

        return redirect()->route('claims.index')
            ->with('success', 'Claim recorded successfully!');
    }

    public function collectClaim(ClaimRecord $claim)
    {
        $claim->update([
            'status'      => 'collected',
            'claimed_date' => now()->toDateString(),
        ]);
        $claim->lostItem->update(['unclaimed' => false]);
        return redirect()->route('claims.index')
            ->with('success', 'Item marked as collected!');
    }
}
?>
