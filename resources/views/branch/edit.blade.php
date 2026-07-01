@extends('layouts.app')

@section('title','Edit Branch')

@section('content')

<h4>Edit Branch</h4>

<form action="{{ route('branch.update',$branch->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Company</label>
        <select name="company_id" class="form-control">
            @foreach($companies as $company)
                <option value="{{ $company->id }}"
                    {{ $branch->company_id == $company->id ? 'selected' : '' }}>
                    {{ $company->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Branch Name</label>
        <input type="text" name="name" value="{{ $branch->name }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" value="{{ $branch->phone }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="{{ $branch->email }}" class="form-control">
    </div>

    <div class="mb-3">
        <label>Address</label>
        <textarea name="address" class="form-control">{{ $branch->address }}</textarea>
    </div>

    <button class="btn btn-primary">Update</button>
</form>

@endsection