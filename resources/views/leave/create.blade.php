@extends('layouts.app')

@section('title','Apply Leave')

@section('content')

<div class="container">

    <h3 class="mb-3">Apply Leave</h3>

    <div class="card p-4">

        <form action="{{ route('leave.store') }}" method="POST">
            @csrf

            <div class="row">

                {{-- Employee --}}
                <div class="col-md-4">
                    <label>Employee</label>

                    <select name="employee_id" class="form-control" required>

                        <option value="">Select Employee</option>

                        @foreach($employees as $emp)

                            <option value="{{ $emp->id }}">
                                {{ $emp->name }} ({{ $emp->finger_id }})
                            </option>

                        @endforeach

                    </select>
                </div>

                {{-- Leave Type --}}
                <div class="col-md-4">
                    <label>Leave Type</label>

                    <select name="leave_type_id" class="form-control" required>

                        <option value="">Select Type</option>

                        @foreach($types as $type)

                            <option value="{{ $type->id }}">
                                {{ $type->name }} ({{ $type->max_days }} days)
                            </option>

                        @endforeach

                    </select>
                </div>

                {{-- From Date --}}
                <div class="col-md-2">
                    <label>From</label>
                    <input type="date" name="from_date" class="form-control" required>
                </div>

                {{-- To Date --}}
                <div class="col-md-2">
                    <label>To</label>
                    <input type="date" name="to_date" class="form-control" required>
                </div>

                {{-- Reason --}}
                <div class="col-md-12 mt-3">
                    <label>Reason</label>
                    <textarea name="reason" class="form-control" rows="3"></textarea>
                </div>

            </div>

            <button class="btn btn-primary mt-3">
                Submit Leave
            </button>

        </form>

    </div>

</div>

@endsection