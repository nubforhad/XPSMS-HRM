@extends('layouts.app')

@section('title','Payroll')

@section('content')

<div class="container">

    <h3>Payroll System</h3>

    <form action="{{ route('payroll.generate') }}" method="POST">
        @csrf

        <div class="row">

            <div class="col-md-3">
                <input type="month" name="month" class="form-control">
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary">Generate Payroll</button>
            </div>

        </div>

    </form>

    <hr>

    <table class="table table-bordered">

        <thead>
            <tr>
                <th>Employee</th>
                <th>Month</th>
                <th>Present</th>
                <th>Leave</th>
                <th>Late</th>
                <th>Absent</th>
                <th>Basic</th>
                <th>Deduction</th>
                <th>Net Salary</th>
            </tr>
        </thead>

        <tbody>

            @foreach($payrolls as $p)

            <tr>
                <td>{{ $p->employee->name }}</td>
                <td>{{ $p->month }}</td>
                <td>{{ $p->total_present }}</td>
                <td>{{ $p->total_leave }}</td>
                <td>{{ $p->total_late }}</td>
                <td>{{ $p->total_absent }}</td>
                <td>{{ $p->basic_salary }}</td>
                <td>{{ $p->deduction }}</td>
                <td><b>{{ $p->net_salary }}</b></td>
            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection