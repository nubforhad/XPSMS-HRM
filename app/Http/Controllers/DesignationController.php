<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use App\Models\Company;
use App\Models\Branch;
use App\Models\Department;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::with(['company','branch','department'])
            ->latest()
            ->paginate(10);

        return view('designation.index', compact('designations'));
    }

    public function create()
    {
        $companies = Company::all();
        $branches = Branch::all();
        $departments = Department::all();

        return view('designation.create', compact('companies','branches','departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'branch_id' => 'required',
            'department_id' => 'required',
            'name' => 'required',
        ]);

        Designation::create($request->all());

        return redirect()->route('designation.index')
            ->with('success','Designation created successfully');
    }

    public function edit($id)
    {
        $designation = Designation::findOrFail($id);
        $companies = Company::all();
        $branches = Branch::all();
        $departments = Department::all();

        return view('designation.edit', compact('designation','companies','branches','departments'));
    }

    public function update(Request $request, $id)
    {
        $designation = Designation::findOrFail($id);
        $designation->update($request->all());

        return redirect()->route('designation.index')
            ->with('success','Designation updated successfully');
    }

    public function destroy($id)
    {
        Designation::findOrFail($id)->delete();

        return response()->json(['success' => true]);
    }
}
