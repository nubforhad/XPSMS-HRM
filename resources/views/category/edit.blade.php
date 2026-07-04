@extends('layouts.app')

@section('content')

<div class="container">

    <h4>Edit Loan Category</h4>

    <form method="POST" action="{{ route('category.update', $category->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-2">
            <label>Name</label>
            <input type="text" name="name" value="{{ $category->name }}" class="form-control" required>
        </div>

        <div class="mb-2">
            <label>Max Amount</label>
            <input type="number" name="max_amount" value="{{ $category->max_amount }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Max Installment</label>
            <input type="number" name="max_installment" value="{{ $category->max_installment }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Interest %</label>
            <input type="number" step="0.01" name="interest_rate" value="{{ $category->interest_rate }}" class="form-control">
        </div>

        <div class="mb-2">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('category.index') }}" class="btn btn-secondary">Back</a>

    </form>

</div>

@endsection