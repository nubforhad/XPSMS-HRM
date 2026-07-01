<?php

 namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::latest()->paginate(10);
        return view('company.index', compact('companies'));
    }

    public function create()
    {
        return view('company.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Company::create($request->all());

        return redirect()->route('company.index')
            ->with('success', 'Company created successfully');
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('company.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $company->update($request->all());

        return redirect()->route('company.index')
            ->with('success', 'Company updated successfully');
    }

    public function destroy($id)
    {
        Company::findOrFail($id)->delete();

        return response()->json(['success' => true]);
    }
}