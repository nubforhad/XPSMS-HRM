<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Company;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::with('company')->latest()->paginate(10);
        return view('branch.index', compact('branches'));
    }

    public function create()
    {
        $companies = Company::all();
        return view('branch.create', compact('companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required',
            'name' => 'required',
        ]);

        Branch::create($request->all());

        return redirect()->route('branch.index')
            ->with('success', 'Branch created successfully');
    }

    public function edit($id)
    {
        $branch = Branch::findOrFail($id);
        $companies = Company::all();

        return view('branch.edit', compact('branch','companies'));
    }

    public function update(Request $request, $id)
    {
        $branch = Branch::findOrFail($id);
        $branch->update($request->all());

        return redirect()->route('branch.index')
            ->with('success', 'Branch updated successfully');
    }

    public function destroy($id)
    {
        Branch::findOrFail($id)->delete();

        return response()->json(['success' => true]);
    }
}