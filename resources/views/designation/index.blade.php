@extends('layouts.app')

@section('title','Designation')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h4>Designation List</h4>

    <a href="{{ route('designation.create') }}" class="btn btn-primary btn-sm">
        + Add Designation
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
            <th>Designation</th>
            <th>Level</th>
            <th>Status</th>
            <th width="180">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($designations as $designation)
        <tr id="row_{{ $designation->id }}">
            <td>{{ $designation->id }}</td>
            <td>{{ $designation->company->name ?? '-' }}</td>
            <td>{{ $designation->branch->name ?? '-' }}</td>
            <td>{{ $designation->department->name ?? '-' }}</td>
            <td>{{ $designation->name }}</td>
            <td>{{ $designation->level }}</td>
            <td>
                @if($designation->status)
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-danger">Inactive</span>
                @endif
            </td>

            <td>
                <a href="{{ route('designation.edit',$designation->id) }}" class="btn btn-sm btn-warning">Edit</a>

                <button class="btn btn-sm btn-danger"
                        onclick="deleteDesignation({{ $designation->id }})">
                    Delete
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $designations->links() }}

@endsection

@push('scripts')
<script>
function deleteDesignation(id)
{
    confirmDelete(function () {

        $.ajax({
            url: '/designation/' + id,
            type: 'DELETE',
            success: function () {
                $('#row_' + id).remove();
                Swal.fire('Deleted!', 'Designation deleted.', 'success');
            }
        });

    });
}
</script>
@endpush