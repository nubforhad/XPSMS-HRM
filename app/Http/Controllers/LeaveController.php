<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Employee;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::with(['employee','leaveType'])
            ->latest()
            ->paginate(20);

        return view('leave.index', compact('leaves'));
    }

    public function create()
    {
        $employees = Employee::all();
        $types = LeaveType::where('status',1)->get();

        return view('leave.create', compact('employees','types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'leave_type_id' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
        ]);

        $from = Carbon::parse($request->from_date);
        $to = Carbon::parse($request->to_date);

        $days = $from->diffInDays($to) + 1;

        Leave::create([
            'employee_id' => $request->employee_id,
            'leave_type_id' => $request->leave_type_id,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'total_days' => $days,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        return redirect()->route('leave.index')
            ->with('success','Leave request submitted successfully');
    }

    public function approve($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->status = 'approved';
        $leave->save();

        return back()->with('success','Leave Approved');
    }

    public function reject($id)
    {
        $leave = Leave::findOrFail($id);
        $leave->status = 'rejected';
        $leave->save();

        return back()->with('success','Leave Rejected');
    }


}