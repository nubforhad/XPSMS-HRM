@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

{{-- Page Title --}}
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Dashboard</h4>
    <small class="text-muted">Welcome back, {{ auth()->user()->name }}</small>
</div>

{{-- Top Cards --}}
<div class="row g-3">

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6 class="text-muted">Total Employees</h6>
                <h3>120</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6 class="text-muted">Present Today</h6>
                <h3 class="text-success">98</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6 class="text-muted">Absent Today</h6>
                <h3 class="text-danger">12</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6 class="text-muted">Late Today</h6>
                <h3 class="text-warning">10</h3>
            </div>
        </div>
    </div>

</div>

{{-- Second Row --}}
<div class="row g-3 mt-1">

    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white">
                <strong>Today Attendance Summary</strong>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">

                    <li class="list-group-item d-flex justify-content-between">
                        Present <span class="badge bg-success">98</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        Absent <span class="badge bg-danger">12</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        Late <span class="badge bg-warning text-dark">10</span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        Leave <span class="badge bg-primary">5</span>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    {{-- Recent Employees --}}
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white">
                <strong>Recent Employees</strong>
            </div>

            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>Rahim</td>
                            <td>HR</td>
                            <td><span class="badge bg-success">Active</span></td>
                        </tr>

                        <tr>
                            <td>Karim</td>
                            <td>IT</td>
                            <td><span class="badge bg-success">Active</span></td>
                        </tr>

                        <tr>
                            <td>Sabbir</td>
                            <td>Accounts</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

{{-- Third Row --}}
<div class="row mt-3">

    <div class="col-md-12">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white">
                <strong>Attendance Overview (Chart Area)</strong>
            </div>

            <div class="card-body">
                <div style="height: 250px; display:flex; align-items:center; justify-content:center; color:#999;">
                    Chart will be added (Chart.js / ApexCharts)
                </div>
            </div>
        </div>
    </div>

</div>

@endsection