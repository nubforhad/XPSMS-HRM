<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Company;
use App\Models\Branch;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::with(['company','branch'])
            ->latest()
            ->paginate(10);

        return view('department.index', compact('departments'));
    }

    public function create()
    {
        $companies = Company::all();
        $branches = Branch::all();

        return view('department.create', compact('companies','branches'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'branch_id'  => 'required',
            'name'       => 'required',
        ]);

        Department::create($request->all());

        return redirect()->route('department.index')
            ->with('success','Department created successfully');
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        $companies = Company::all();
        $branches = Branch::all();

        return view('department.edit', compact('department','companies','branches'));
    }

    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);
        $department->update($request->all());

        return redirect()->route('department.index')
            ->with('success','Department updated successfully');
    }

    public function destroy($id)
    {
        Department::findOrFail($id)->delete();

        return response()->json(['success' => true]);
    }
}