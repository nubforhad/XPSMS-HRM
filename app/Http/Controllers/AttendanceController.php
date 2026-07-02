<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * Attendance List
     */
    public function index()
    {
        $attendances = Attendance::with('employee')
            ->orderBy('date', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(20);

        return view('attendance.index', compact('attendances'));
    }

    /**
     * Finger Scan (Main Logic)
     */
    public function scanFinger(Request $request)
    {
        $request->validate([
            'finger_id' => 'required'
        ]);

        // =========================
        // Employee Validate
        // =========================
        $employee = Employee::where('finger_id', $request->finger_id)->first();

        if (!$employee) {
            return response()->json([
                'status' => false,
                'message' => 'Finger ID not found.'
            ], 404);
        }

        $today = Carbon::today()->toDateString();
        $now = Carbon::now();

        // =========================
        // Attendance Check Today
        // =========================
        $attendance = Attendance::where('employee_id', $employee->id)
            ->whereDate('date', $today)
            ->first();

        // =========================
        // OFFICE TIME RULE
        // =========================
        $officeTime = Carbon::today()->setTime(10, 0, 0);   // 10:00 AM
        $graceTime  = Carbon::today()->setTime(10, 15, 0);  // 10:15 AM

        /**
         * ======================
         * FIRST SCAN = CHECK IN
         * ======================
         */
        if (!$attendance) {

            $status = 'present';
            $lateMinutes = 0;

            // Late condition (after 10:15 AM)
            if ($now->greaterThan($graceTime)) {

                $status = 'late';

                // Late count from 10:00 AM
                $lateMinutes = $officeTime->diffInMinutes($now);
            }

            Attendance::create([
                'employee_id'   => $employee->id,
                'date'          => $today,
                'in_time'       => $now->format('H:i:s'),
                'status'        => $status,
                'late_minutes'  => $lateMinutes,
            ]);

            return response()->json([
                'status'   => true,
                'type'     => 'checkin',
                'employee' => $employee->name,
                'message'  => 'Check In Successful'
            ]);
        }

        /**
         * ======================
         * SECOND SCAN = CHECK OUT
         * ======================
         */
        if (!$attendance->out_time) {

            $attendance->out_time = $now->format('H:i:s');

            $in  = Carbon::parse($attendance->in_time);
            $out = Carbon::parse($attendance->out_time);

            $attendance->working_hours = $in->diff($out)->format('%H:%I:%S');

            $attendance->save();

            return response()->json([
                'status'   => true,
                'type'     => 'checkout',
                'employee' => $employee->name,
                'message'  => 'Check Out Successful'
            ]);
        }

        /**
         * ======================
         * ALREADY COMPLETED
         * ======================
         */
        return response()->json([
            'status'   => false,
            'employee' => $employee->name,
            'message'  => 'Attendance already completed today'
        ]);
    }

    /**
     * Show Attendance
     */
    public function show($id)
    {
        $attendance = Attendance::with('employee')->findOrFail($id);

        return view('attendance.show', compact('attendance'));
    }

    /**
     * Delete Attendance
     */
    public function destroy($id)
    {
        Attendance::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Attendance deleted successfully');
    }
}