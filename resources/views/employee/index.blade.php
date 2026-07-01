@extends('layouts.app')

@section('title','Employee')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h4>Employee List</h4>

    <a href="{{ route('employee.create') }}" class="btn btn-primary btn-sm">
        + Add Employee
    </a>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Company</th>
            <th>Branch</th>
            <th>Department</th>
            <th>Designation</th>
            <th>Finger ID</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($employees as $emp)
        <tr id="row_{{ $emp->id }}">
            <td>{{ $emp->id }}</td>

            <td>
                @if($emp->photo)
                    <img src="{{ asset('uploads/employees/'.$emp->photo) }}"
                         width="40" height="40" class="rounded-circle">
                @endif
            </td>

            <td>{{ $emp->name }}</td>
            <td>{{ $emp->company->name ?? '-' }}</td>
            <td>{{ $emp->branch->name ?? '-' }}</td>
            <td>{{ $emp->department->name ?? '-' }}</td>
            <td>{{ $emp->designation->name ?? '-' }}</td>
            <td>{{ $emp->finger_id }}</td>

            <td>
                @if($emp->status)
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-danger">Inactive</span>
                @endif
            </td>

            <td>
                <a href="{{ route('employee.edit',$emp->id) }}" class="btn btn-warning btn-sm">Edit</a>

                <button class="btn btn-danger btn-sm"
                        onclick="deleteEmployee({{ $emp->id }})">
                    Delete
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $employees->links() }}

@endsection

@push('scripts')
<script>
function deleteEmployee(id)
{
    confirmDelete(function () {
        $.ajax({
            url: '/employee/' + id,
            type: 'DELETE',
            success: function () {
                $('#row_' + id).remove();
                Swal.fire('Deleted!', 'Employee deleted.', 'success');
            }
        });
    });
}
</script>
@endpush