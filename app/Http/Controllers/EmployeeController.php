<?php

 namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with([
            'company','branch','department','designation'
        ])->latest()->paginate(10);

        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        $companies = Company::all();
        $branches = Branch::all();
        $departments = Department::all();
        $designations = Designation::all();

        return view('employee.create', compact(
            'companies','branches','departments','designations'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'finger_id' => 'nullable|unique:employees,finger_id',
        ]);

        $data = $request->all();

        // Photo upload
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/employees'), $filename);
            $data['photo'] = $filename;
        }

        Employee::create($data);

        return redirect()->route('employee.index')
            ->with('success','Employee created successfully');
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);

        $companies = Company::all();
        $branches = Branch::all();
        $departments = Department::all();
        $designations = Designation::all();

        return view('employee.edit', compact(
            'employee','companies','branches','departments','designations'
        ));
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/employees'), $filename);
            $data['photo'] = $filename;
        }

        $employee->update($data);

        return redirect()->route('employee.index')
            ->with('success','Employee updated successfully');
    }

    public function destroy($id)
    {
        Employee::findOrFail($id)->delete();

        return response()->json(['success' => true]);
    }
}