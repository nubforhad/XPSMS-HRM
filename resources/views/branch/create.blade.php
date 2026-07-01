@extends('layouts.app')

@section('title','Create Branch')

@section('content')

<h4>Create Branch</h4>

<form action="{{ route('branch.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Company</label>
        <select name="company_id" class="form-control" required>
            <option value="">Select Company</option>
            @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Branch Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
    </div>

    <div class="mb-3">
        <label>Address</label>
        <textarea name="address" class="form-control"></textarea>
    </div>

    <button class="btn btn-primary">Save</button>
</form>

@endsection