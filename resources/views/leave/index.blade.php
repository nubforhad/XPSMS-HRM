@extends('layouts.app')

@section('title','Leave Management')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>Leave Management</h3>

        <a href="{{ route('leave.create') }}" class="btn btn-primary">
            + Apply Leave
        </a>

    </div>

    {{-- TABLE --}}
    <div class="card p-3">

        <div class="table-responsive">

            <table class="table table-bordered table-hover">

                <thead class="table-dark">

                    <tr>
                        <th>#</th>
                        <th>Employee</th>
                        <th>Leave Type</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Days</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($leaves as $key => $leave)

                        <tr>

                            <td>{{ $leaves->firstItem() + $key }}</td>

                            <td>{{ $leave->employee->name ?? '-' }}</td>

                            <td>{{ $leave->leaveType->name ?? '-' }}</td>

                            <td>{{ $leave->from_date }}</td>

                            <td>{{ $leave->to_date }}</td>

                            <td>{{ $leave->total_days }}</td>

                            <td>

                                @if($leave->status == 'pending')
                                    <span class="badge bg-warning">Pending</span>

                                @elseif($leave->status == 'approved')
                                    <span class="badge bg-success">Approved</span>

                                @else
                                    <span class="badge bg-danger">Rejected</span>
                                @endif

                            </td>

                            <td>

                                @if($leave->status == 'pending')

                                    <a href="{{ route('leave.approve',$leave->id) }}"
                                       class="btn btn-success btn-sm">
                                        Approve
                                    </a>

                                    <a href="{{ route('leave.reject',$leave->id) }}"
                                       class="btn btn-danger btn-sm">
                                        Reject
                                    </a>

                                @endif

                                <a href="{{ route('leave.delete',$leave->id) }}"
                                   class="btn btn-dark btn-sm"
                                   onclick="return confirm('Are you sure?')">

                                    Delete

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8" class="text-center">

                                No Leave Found

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        <div class="mt-3">

            {{ $leaves->links() }}

        </div>

    </div>

</div>

@endsection