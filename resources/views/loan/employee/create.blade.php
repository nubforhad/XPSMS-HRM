@extends('layouts.app')

@section('content')

<div class="container">

    <h4>Apply Employee Loan</h4>

    <form method="POST" action="{{ route('loan.employee-loan.store') }}">
        @csrf

        <div class="mb-2">
            <label>Employee</label>
            <select name="employee_id" class="form-control" required>
                <option value="">Select Employee</option>
                @foreach($employees as $emp)
                    <option value="{{ $emp->id }}">{{ $emp->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Loan Category</label>
            <select name="loan_category_id" class="form-control" required>
                <option value="">Select Category</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-2">
            <label>Loan Amount</label>
            <input type="number" name="loan_amount" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Installment Count</label>
            <input type="number" name="installment_count" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Reason</label>
            <textarea name="reason" class="form-control"></textarea>
        </div>

        <button class="btn btn-success">Submit</button>
        <a href="{{ route('loan.employee-loan.index') }}" class="btn btn-secondary">Back</a>

    </form>

</div>

@endsection