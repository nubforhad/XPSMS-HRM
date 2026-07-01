@extends('layouts.app')

@section('title','Edit Employee')

@section('content')

<h4>Edit Employee</h4>

<form action="{{ route('employee.update',$employee->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">

        {{-- Company --}}
        <div class="col-md-3 mb-3">
            <label>Company</label>
            <select name="company_id" class="form-control">
                @foreach($companies as $company)
                    <option value="{{ $company->id }}"
                        {{ $employee->company_id == $company->id ? 'selected' : '' }}>
                        {{ $company->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Branch --}}
        <div class="col-md-3 mb-3">
            <label>Branch</label>
            <select name="branch_id" class="form-control">
                @foreach($branches as $branch)
                    <option value="{{ $branch->id }}"
                        {{ $employee->branch_id == $branch->id ? 'selected' : '' }}>
                        {{ $branch->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Department --}}
        <div class="col-md-3 mb-3">
            <label>Department</label>
            <select name="department_id" class="form-control">
                @foreach($departments as $dept)
                    <option value="{{ $dept->id }}"
                        {{ $employee->department_id == $dept->id ? 'selected' : '' }}>
                        {{ $dept->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Designation --}}
        <div class="col-md-3 mb-3">
            <label>Designation</label>
            <select name="designation_id" class="form-control">
                @foreach($designations as $des)
                    <option value="{{ $des->id }}"
                        {{ $employee->designation_id == $des->id ? 'selected' : '' }}>
                        {{ $des->name }}
                    </option>
                @endforeach
            </select>
        </div>

    </div>

    <div class="row">

        {{-- Name --}}
        <div class="col-md-4 mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $employee->name }}" class="form-control">
        </div>

        {{-- Email --}}
        <div class="col-md-4 mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $employee->email }}" class="form-control">
        </div>

        {{-- Phone --}}
        <div class="col-md-4 mb-3">
            <label>Phone</label>
            <input type="text" name="phone" value="{{ $employee->phone }}" class="form-control">
        </div>

    </div>

    <div class="row">

        {{-- NID --}}
        <div class="col-md-4 mb-3">
            <label>NID</label>
            <input type="text" name="nid" value="{{ $employee->nid }}" class="form-control">
        </div>

        {{-- Join Date --}}
        <div class="col-md-4 mb-3">
            <label>Join Date</label>
            <input type="date" name="join_date" value="{{ $employee->join_date }}" class="form-control">
        </div>

        {{-- Finger ID --}}
        <div class="col-md-4 mb-3">
            <label>Finger ID</label>
            <input type="text" name="finger_id" value="{{ $employee->finger_id }}" class="form-control">
        </div>

    </div>

    <div class="row">

        {{-- Photo --}}
        <div class="col-md-6 mb-3">
            <label>Photo</label>
            <input type="file" name="photo" class="form-control">

            @if($employee->photo)
                <img src="{{ asset('uploads/employees/'.$employee->photo) }}"
                     width="60" class="mt-2 rounded">
            @endif
        </div>

        {{-- Status --}}
        <div class="col-md-6 mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ $employee->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $employee->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

    </div>

    <button class="btn btn-primary">Update Employee</button>

</form>

@endsection