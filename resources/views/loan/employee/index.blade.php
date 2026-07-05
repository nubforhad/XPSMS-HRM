@extends('layouts.app')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between mb-3">
        <h4>Employee Loans</h4>
        <a href="{{ route('employee-loan.create') }}" class="btn btn-primary">+ Apply Loan</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Employee</th>
                <th>Category</th>
                <th>Amount</th>
                <th>Installment</th>
                <th>Per Installment</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($loans as $key => $loan)
                <tr>
                    <td>{{ $key+1 }}</td>

                    <td>{{ $loan->employee->name ?? 'N/A' }}</td>
                    <td>{{ $loan->category->name ?? 'N/A' }}</td>

                    <td>{{ $loan->loan_amount }}</td>
                    <td>{{ $loan->installment_count }}</td>
                    <td>{{ $loan->per_installment }}</td>

                    <td>
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
                    </td>

                    <td>
                        <a href="{{ route('employee-loan.show', $loan->id) }}" class="btn btn-sm btn-info">View</a>
                        <a href="{{ route('employee-loan.edit', $loan->id) }}" class="btn btn-sm btn-primary">Edit</a>

                        <form action="{{ route('employee-loan.destroy', $loan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection