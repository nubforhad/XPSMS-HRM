@extends('layouts.app')

@section('content')

<div class="container">

    <h4>Loan Details</h4>

    <div class="card">
        <div class="card-body">

            <p><strong>Employee:</strong> {{ $loan->employee->name ?? 'N/A' }}</p>
            <p><strong>Category:</strong> {{ $loan->category->name ?? 'N/A' }}</p>

            <p><strong>Loan Amount:</strong> {{ $loan->loan_amount }}</p>
            <p><strong>Installments:</strong> {{ $loan->installment_count }}</p>
            <p><strong>Per Installment:</strong> {{ $loan->per_installment }}</p>

            <p><strong>Status:</strong>
                @if($loan->status == 'pending')
                    <span class="badge bg-warning">Pending</span>
                @elseif($loan->status == 'approved')
                    <span class="badge bg-info">Approved</span>
                @elseif($loan->status == 'active')
                    <span class="badge bg-success">Active</span>
                @elseif($loan->status == 'rejected')
                    <span class="badge bg-danger">Rejected</span>
                @else
                    <span class="badge bg-secondary">Closed</span>
                @endif
            </p>

            <p><strong>Reason:</strong> {{ $loan->reason }}</p>

            <a href="{{ route('employee-loan.index') }}" class="btn btn-secondary">Back</a>

        </div>
    </div>

</div>

@endsection