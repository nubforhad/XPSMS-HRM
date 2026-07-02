@extends('layouts.app')

@section('title','Leave Type')

@section('content')

<div class="container">

    <h3>Leave Type Management</h3>

    {{-- FORM --}}
    <div class="card p-3 mb-3">

        <form action="{{ route('leave.type.store') }}" method="POST">
            @csrf

            <div class="row">

                <div class="col-md-4">
                    <input type="text" name="name" class="form-control" placeholder="Leave Type Name">
                </div>

                <div class="col-md-3">
                    <input type="number" name="max_days" class="form-control" placeholder="Max Days">
                </div>

                <div class="col-md-2">
                    <button class="btn btn-primary w-100">Save</button>
                </div>

            </div>

        </form>

    </div>

    {{-- TABLE --}}
    <div class="card p-3">

        <table class="table table-bordered">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Max Days</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach($types as $key => $type)

                <tr>

                    <td>{{ $key+1 }}</td>
                    <td>{{ $type->name }}</td>
                    <td>{{ $type->max_days }}</td>
                    <td>
                        @if($type->status)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-danger">Inactive</span>
                        @endif
                    </td>

                    <td>

                        {{-- EDIT (simple inline) --}}
                        <form action="{{ route('leave.type.update',$type->id) }}" method="POST" style="display:inline;">
                            @csrf

                            <input type="text" name="name" value="{{ $type->name }}" style="width:120px;">
                            <input type="number" name="max_days" value="{{ $type->max_days }}" style="width:80px;">

                            <button class="btn btn-sm btn-warning">Update</button>
                        </form>

                        <a href="{{ route('leave.type.delete',$type->id) }}"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Delete?')">
                            Delete
                        </a>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection