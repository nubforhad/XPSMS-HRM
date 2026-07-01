@extends('layouts.app')

@section('title','Create Employee')

@section('content')

<h4>Create Employee</h4>

<form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">

        {{-- Company --}}
        <div class="col-md-3 mb-3">
            <label>Company</label>
            <select name="company_id" class="form-control" required>
                <option value="">Select Company</option>
                @foreach($companies as $company)
                    <option value="{{ $company->id }}">{{ $company->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Branch --}}
        <div class="col-md-3 mb-3">
            <label>Branch</label>
            <select name="branch_id" class="form-control" required>
                <option value="">Select Branch</option>
                @foreach($branches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Department --}}
        <div class="col-md-3 mb-3">
            <label>Department</label>
            <select name="department_id" class="form-control" required>
                <option value="">Select Department</option>
                @foreach($departments as $dept)
                    <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                @endforeach
            </select>
        </div>

        {{-- Designation --}}
        <div class="col-md-3 mb-3">
            <label>Designation</label>
            <select name="designation_id" class="form-control" required>
                <option value="">Select Designation</option>
                @foreach($designations as $des)
                    <option value="{{ $des->id }}">{{ $des->name }}</option>
                @endforeach
            </select>
        </div>

    </div>

    <div class="row">

        {{-- Name --}}
        <div class="col-md-4 mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        {{-- Email --}}
        <div class="col-md-4 mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        {{-- Phone --}}
        <div class="col-md-4 mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control">
        </div>

    </div>

    <div class="row">

        {{-- NID --}}
        <div class="col-md-4 mb-3">
            <label>NID</label>
            <input type="text" name="nid" class="form-control">
        </div>

        {{-- Join Date --}}
        <div class="col-md-4 mb-3">
            <label>Join Date</label>
            <input type="date" name="join_date" class="form-control">
        </div>

        {{-- Finger ID --}}
        <div class="col-md-4 mb-3">
            <label>Finger ID</label>
            <input type="text" name="finger_id" class="form-control" placeholder="Device ID">
        </div>

    </div>

    <div class="row">

        {{-- Photo --}}
        <div class="col-md-6 mb-3">
            <label>Photo</label>
            <input type="file" name="photo" class="form-control">
        </div>

        {{-- Status --}}
        <div class="col-md-6 mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

    </div>

    <button class="btn btn-primary">Save Employee</button>

</form>

@endsection