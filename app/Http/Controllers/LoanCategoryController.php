<?php

namespace App\Http\Controllers;

use App\Models\LoanCategory;
use Illuminate\Http\Request;

class LoanCategoryController extends Controller
{
    public function index()
    {
        $categories = LoanCategory::latest()->get();
        return view('loan.category.index', compact('categories'));
    }

    public function create()
    {
        return view('loan.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        LoanCategory::create($request->all());

        return redirect()->route('category.index')
            ->with('success', 'Loan Category Created Successfully');
    }

    public function edit($id)
    {
        $category = LoanCategory::findOrFail($id);
        return view('loan.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = LoanCategory::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('category.index')
            ->with('success', 'Loan Category Updated Successfully');
    }

    public function destroy($id)
    {
        LoanCategory::findOrFail($id)->delete();

        return back()->with('success', 'Loan Category Deleted');
    }
}