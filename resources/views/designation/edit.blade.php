@extends('layouts.app')

@section('title','Edit Designation')

@section('content')

<h4>Edit Designation</h4>

<form action="{{ route('designation.update', $designation->id) }}" method="POST">
    @csrf
    @method('PUT')

    {{-- Company --}}
    <div class="mb-3">
        <label>Company</label>
        <select name="company_id" class="form-control">
            @foreach($companies as $company)
                <option value="{{ $company->id }}"
                    {{ $designation->company_id == $company->id ? 'selected' : '' }}>
                    {{ $company->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Branch --}}
    <div class="mb-3">
        <label>Branch</label>
        <select name="branch_id" class="form-control">
            @foreach($branches as $branch)
                <option value="{{ $branch->id }}"
                    {{ $designation->branch_id == $branch->id ? 'selected' : '' }}>
                    {{ $branch->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Department --}}
    <div class="mb-3">
        <label>Department</label>
        <select name="department_id" class="form-control">
            @foreach($departments as $department)
                <option value="{{ $department->id }}"
                    {{ $designation->department_id == $department->id ? 'selected' : '' }}>
                    {{ $department->name }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Designation Name --}}
    <div class="mb-3">
        <label>Designation Name</label>
        <input type="text"
               name="name"
               value="{{ $designation->name }}"
               class="form-control"
               required>
    </div>

    {{-- Level --}}
    <div class="mb-3">
        <label>Level</label>
        <input type="number"
               name="level"
               value="{{ $designation->level }}"
               class="form-control">
    </div>

    {{-- Status --}}
    <div class="mb-3">
        <label>Status</label>
        <select name="status" class="form-control">
            <option value="1" {{ $designation->status == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ $designation->status == 0 ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

    <button class="btn btn-primary">
        Update
    </button>

    <a href="{{ route('designation.index') }}" class="btn btn-secondary">
        Cancel
    </a>

</form>

@endsection