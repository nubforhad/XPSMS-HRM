@extends('layouts.app')

@section('title','Create Department')

@section('content')

<h4>Create Department</h4>

<form action="{{ route('department.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Company</label>
        <select name="company_id" class="form-control">
            <option value="">Select Company</option>
            @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Branch</label>
        <select name="branch_id" class="form-control">
            <option value="">Select Branch</option>
            @foreach($branches as $branch)
                <option value="{{ $branch->id }}">{{ $branch->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Department Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <button class="btn btn-primary">Save</button>
</form>

@endsection