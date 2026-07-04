@extends('layouts.app')

@section('content')

<div class="container">

    <h4>Edit Employee Loan</h4>

    <form method="POST" action="{{ route('loan.employee-loan.update', $loan->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-2">
            <label>Employee</label>
            <select name="employee_id" class="form-control">
                @foreach($employees as $emp)
                    <option value="{{ $emp->id }}" {{ $loan->employee_id == $emp->id ? 'selected' : '' }}>
                        {{ $emp->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Loan Category</label>
            <select name="loan_category_id" class="form-control">
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $loan->loan_category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Loan Amount</label>
            <input type="number" name="loan_amount" value="{{ $loan->loan_amount }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Installment Count</label>
            <input type="number" name="installment_count" value="{{ $loan->installment_count }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="pending" {{ $loan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $loan->status == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="active" {{ $loan->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="rejected" {{ $loan->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                <option value="closed" {{ $loan->status == 'closed' ? 'selected' : '' }}>Closed</option>
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('loan.employee-loan.index') }}" class="btn btn-secondary">Back</a>

    </form>

</div>

@endsection