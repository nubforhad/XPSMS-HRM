<?php
namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    /**
     * List
     */
    public function index()
    {
        $types = LeaveType::latest()->get();
        return view('leave_type.index', compact('types'));
    }

    /**
     * Store
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'max_days' => 'required|numeric'
        ]);

        LeaveType::create([
            'name' => $request->name,
            'max_days' => $request->max_days,
            'status' => 1
        ]);

        return back()->with('success', 'Leave Type Created');
    }

    /**
     * Update
     */
    public function update(Request $request, $id)
    {
        $type = LeaveType::findOrFail($id);

        $type->update([
            'name' => $request->name,
            'max_days' => $request->max_days,
            'status' => $request->status ?? 1
        ]);

        return back()->with('success', 'Leave Type Updated');
    }

    /**
     * Delete
     */
    public function destroy($id)
    {
        LeaveType::findOrFail($id)->delete();

        return back()->with('success', 'Leave Type Deleted');
    }
}