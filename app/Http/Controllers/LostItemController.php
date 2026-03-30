<?php
namespace App\Http\Controllers;

use App\Models\LostItem;
use Illuminate\Http\Request;

class LostItemController extends Controller
{
    public function index()
    {
        $lostItems = LostItem::latest()->paginate(10);
        return view('lost-items.index', compact('lostItems'));
    }

    public function create()
    {
        return view('lost-items.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_name'     => 'required|string|max:255',
            'description'   => 'required|string',
            'category'      => 'required|string|max:100',
            'location_found' => 'required|string|max:255',
            'date_found'    => 'required|date',
        ]);
        $validated['unclaimed'] = true;
        LostItem::create($validated);
        return redirect()->route('lost-items.index')->with('success', 'Lost item reported successfully!');
    }

    public function edit(LostItem $lostItem)
    {
        return view('lost-items.edit', compact('lostItem'));
    }

    public function update(Request $request, LostItem $lostItem)
    {
        $validated = $request->validate([
            'item_name'     => 'required|string|max:255',
            'description'   => 'required|string',
            'category'      => 'required|string|max:100',
            'location_found' => 'required|string|max:255',
            'date_found'    => 'required|date',
        ]);
        $lostItem->update($validated);
        return redirect()->route('lost-items.index')->with('success', 'Lost item updated successfully!');
    }

    public function destroy(LostItem $lostItem)
    {
        $lostItem->delete();
        return redirect()->route('lost-items.index')->with('success', 'Lost item deleted successfully!');
    }
}
?>
