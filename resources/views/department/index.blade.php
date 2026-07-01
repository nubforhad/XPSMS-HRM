@extends('layouts.app')

@section('title','Department')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h4>Department List</h4>

    <a href="{{ route('department.create') }}" class="btn btn-primary btn-sm">
        + Add Department
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
            <th>Company</th>
            <th>Branch</th>
            <th>Department</th>
            <th>Status</th>
            <th width="180">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($departments as $department)
        <tr id="row_{{ $department->id }}">
            <td>{{ $department->id }}</td>
            <td>{{ $department->company->name ?? '-' }}</td>
            <td>{{ $department->branch->name ?? '-' }}</td>
            <td>{{ $department->name }}</td>
            <td>
                @if($department->status)
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-danger">Inactive</span>
                @endif
            </td>

            <td>
                <a href="{{ route('department.edit',$department->id) }}" class="btn btn-sm btn-warning">Edit</a>

                <button class="btn btn-sm btn-danger"
                        onclick="deleteDepartment({{ $department->id }})">
                    Delete
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $departments->links() }}

@endsection

@push('scripts')
<script>
function deleteDepartment(id)
{
    confirmDelete(function () {

        $.ajax({
            url: '/department/' + id,
            type: 'DELETE',
            success: function () {
                $('#row_' + id).remove();
                Swal.fire('Deleted!', 'Department deleted.', 'success');
            }
        });

    });
}
</script>
@endpush