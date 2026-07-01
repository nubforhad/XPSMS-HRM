@extends('layouts.app')

@section('title','Create Designation')

@section('content')

<h4>Create Designation</h4>

<form action="{{ route('designation.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Company</label>
        <select name="company_id" class="form-control">
            @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Branch</label>
        <select name="branch_id" class="form-control">
            @foreach($branches as $branch)
                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Department</label>
        <select name="department_id" class="form-control">
            @foreach($departments as $department)
                <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Designation Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Level</label>
        <input type="number" name="level" class="form-control" value="1">
    </div>

    <button class="btn btn-primary">Save</button>
</form>

@endsection