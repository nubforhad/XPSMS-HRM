@extends('layouts.app')

@section('title','Edit Department')

@section('content')

<h4>Edit Department</h4>

<form action="{{ route('department.update',$department->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Company</label>
        <select name="company_id" class="form-control">
            @foreach($companies as $company)
                <option value="{{ $company->id }}"
                    {{ $department->company_id == $company->id ? 'selected' : '' }}>
                    {{ $company->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Branch</label>
        <select name="branch_id" class="form-control">
            @foreach($branches as $branch)
                <option value="{{ $branch->id }}"
                    {{ $department->branch_id == $branch->id ? 'selected' : '' }}>
                    {{ $branch->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Department Name</label>
        <input type="text" name="name" value="{{ $department->name }}" class="form-control">
    </div>

    <button class="btn btn-primary">Update</button>
</form>

@endsection