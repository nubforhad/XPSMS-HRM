<?php

namespace App\Http\Controllers;

use App\Models\EmployeeLoan;
use App\Models\LoanCategory;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeLoanController extends Controller
{
    public function index()
    {
        $loans = EmployeeLoan::with(['employee', 'category'])
                    ->latest()
                    ->get();

        return view('loan.employee.index', compact('loans'));
    }

    public function create()
    {
        $employees = Employee::all();
        $categories = LoanCategory::where('status', 1)->get();

        return view('loan.employee.create', compact('employees', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'loan_category_id' => 'required',
            'loan_amount' => 'required|numeric|min:1',
            'installment_count' => 'required|numeric|min:1',
        ]);

        // 💡 auto calculate per installment
        $perInstallment = $request->loan_amount / $request->installment_count;

        EmployeeLoan::create([
            'employee_id' => $request->employee_id,
            'loan_category_id' => $request->loan_category_id,
            'loan_amount' => $request->loan_amount,
            'installment_count' => $request->installment_count,
            'per_installment' => $perInstallment,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        return redirect()->route('employee-loan.index')
            ->with('success', 'Loan Applied Successfully');
    }

    public function show($id)
    {
        $loan = EmployeeLoan::with(['employee', 'category'])->findOrFail($id);

        return view('loan.employee.show', compact('loan'));
    }

    public function edit($id)
    {
        $loan = EmployeeLoan::findOrFail($id);
        $employees = Employee::all();
        $categories = LoanCategory::all();

        return view('loan.employee.edit', compact('loan', 'employees', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $loan = EmployeeLoan::findOrFail($id);

        $request->validate([
            'employee_id' => 'required',
            'loan_category_id' => 'required',
            'loan_amount' => 'required|numeric',
            'installment_count' => 'required|numeric',
        ]);

        $perInstallment = $request->loan_amount / $request->installment_count;

        $loan->update([
            'employee_id' => $request->employee_id,
            'loan_category_id' => $request->loan_category_id,
            'loan_amount' => $request->loan_amount,
            'installment_count' => $request->installment_count,
            'per_installment' => $perInstallment,
            'reason' => $request->reason,
            'status' => $request->status,
        ]);

        return redirect()->route('employee-loan.index')
            ->with('success', 'Loan Updated Successfully');
    }

    public function destroy($id)
    {
        EmployeeLoan::findOrFail($id)->delete();

        return back()->with('success', 'Loan Deleted Successfully');
    }
}