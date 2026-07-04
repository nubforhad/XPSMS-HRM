@extends('layouts.app')

@section('content')

<div class="container">
    <h4>Add Loan Category</h4>

    <form method="POST" action="{{ route('category.store') }}">
        @csrf

        <div class="mb-2">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Max Amount</label>
            <input type="number" name="max_amount" class="form-control">
        </div>

        <div class="mb-2">
            <label>Max Installment</label>
            <input type="number" name="max_installment" class="form-control">
        </div>

        <div class="mb-2">
            <label>Interest %</label>
            <input type="number" step="0.01" name="interest_rate" class="form-control">
        </div>

        <div class="mb-2">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button class="btn btn-success">Save</button>
    </form>
</div>

@endsection