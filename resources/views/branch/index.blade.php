@extends('layouts.app')

@section('title','Branch')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h4>Branch List</h4>

    <a href="{{ route('branch.create') }}" class="btn btn-primary btn-sm">
        + Add Branch
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
            <th>Branch Name</th>
            <th>Phone</th>
            <th>Status</th>
            <th width="180">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($branches as $branch)
        <tr id="row_{{ $branch->id }}">
            <td>{{ $branch->id }}</td>
            <td>{{ $branch->company->name ?? '-' }}</td>
            <td>{{ $branch->name }}</td>
            <td>{{ $branch->phone }}</td>
            <td>
                @if($branch->status)
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-danger">Inactive</span>
                @endif
            </td>

            <td>
                <a href="{{ route('branch.edit',$branch->id) }}" class="btn btn-sm btn-warning">Edit</a>

                <button class="btn btn-sm btn-danger"
                        onclick="deleteBranch({{ $branch->id }})">
                    Delete
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $branches->links() }}

@endsection

@push('scripts')
<script>
function deleteBranch(id)
{
    confirmDelete(function () {

        $.ajax({
            url: '/branch/' + id,
            type: 'DELETE',
            success: function () {
                $('#row_' + id).remove();
                Swal.fire('Deleted!', 'Branch deleted.', 'success');
            }
        });

    });
}
</script>
@endpush