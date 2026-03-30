<?php
namespace App\Http\Controllers;

use App\Models\Reporter;
use Illuminate\Http\Request;

class ReporterController extends Controller
{
    public function index()
    {
        $reporters = Reporter::latest()->paginate(10);
        return view('reporters.index', compact('reporters'));
    }

    public function create()
    {
        return view('reporters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:reporters',
            'phone' => 'required|string|max:20',
            'dorm'  => 'nullable|string|max:100',
        ]);
        Reporter::create($request->all());
        return redirect()->route('reporters.index')->with('success', 'Reporter added successfully!');
    }

    public function edit(Reporter $reporter)
    {
        return view('reporters.edit', compact('reporter'));
    }

    public function update(Request $request, Reporter $reporter)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:reporters,email,' . $reporter->id,
            'phone' => 'required|string|max:20',
            'dorm'  => 'nullable|string|max:100',
        ]);
        $reporter->update($request->all());
        return redirect()->route('reporters.index')->with('success', 'Reporter updated successfully!');
    }

    public function destroy(Reporter $reporter)
    {
        $reporter->delete();
        return redirect()->route('reporters.index')->with('success', 'Reporter deleted!');
    }
}
?>
