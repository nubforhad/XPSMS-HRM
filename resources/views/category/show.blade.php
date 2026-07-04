@extends('layouts.app')

@section('content')

<div class="container">

    <h4>Loan Category Details</h4>

    <div class="card mt-3">
        <div class="card-body">

            <p><strong>Name:</strong> {{ $category->name }}</p>

            <p><strong>Max Amount:</strong> {{ $category->max_amount }}</p>

            <p><strong>Max Installment:</strong> {{ $category->max_installment }}</p>

            <p><strong>Interest Rate:</strong> {{ $category->interest_rate }}%</p>

            <p>
                <strong>Status:</strong>
                @if($category->status)
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-danger">Inactive</span>
                @endif
            </p>

            <a href="{{ route('category.index') }}" class="btn btn-secondary">Back</a>
            <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info">Edit</a>

        </div>
    </div>

</div>

@endsection