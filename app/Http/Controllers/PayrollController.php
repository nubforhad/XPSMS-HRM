<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\Employee;
use App\Models\Attendance;
use App\Models\Leave;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PayrollController extends Controller
{
    public function generate(Request $request)
    {
        $month = $request->month ?? date('Y-m');

        $employees = Employee::all();

        foreach ($employees as $emp) {

            // =====================
            // Attendance Count
            // =====================
            $present = Attendance::where('employee_id', $emp->id)
                ->where('status', 'present')
                ->where('date', 'like', "$month%")
                ->count();

            $late = Attendance::where('employee_id', $emp->id)
                ->where('status', 'late')
                ->where('date', 'like', "$month%")
                ->count();

            // =====================
            // Leave Count
            // =====================
            $leave = Leave::where('employee_id', $emp->id)
                ->where('status', 'approved')
                ->where('from_date', 'like', "$month%")
                ->count();

            // =====================
            // Salary Setup
            // =====================
            $basic = $emp->salary ?? 20000;

            $perDay = $basic / 30;

            $deduction = ($late * 100) + (($present + $leave < 30) ? (30 - ($present + $leave)) * $perDay : 0);

            $bonus = 0;

            $net = ($basic - $deduction) + $bonus;

            // =====================
            // Save Payroll
            // =====================
            Payroll::updateOrCreate(
                [
                    'employee_id' => $emp->id,
                    'month' => $month
                ],
                [
                    'total_present' => $present,
                    'total_leave' => $leave,
                    'total_late' => $late,
                    'total_absent' => max(0, 30 - ($present + $leave)),
                    'basic_salary' => $basic,
                    'deduction' => $deduction,
                    'bonus' => $bonus,
                    'net_salary' => $net
                ]
            );
        }

        return back()->with('success', 'Payroll Generated Successfully');
    }

    public function index()
    {
        $payrolls = Payroll::with('employee')
            ->latest()
            ->paginate(20);

        return view('payroll.index', compact('payrolls'));
    }
}