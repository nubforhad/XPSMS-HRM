@extends('layouts.app')

@section('title','Company')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h4>Company List</h4>

    <a href="{{ route('company.create') }}" class="btn btn-primary btn-sm">
        + Add Company
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
            <th>Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Status</th>
            <th width="180">Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach($companies as $company)
        <tr id="row_{{ $company->id }}">
            <td>{{ $company->id }}</td>
            <td>{{ $company->name }}</td>
            <td>{{ $company->phone }}</td>
            <td>{{ $company->email }}</td>
            <td>
                @if($company->status)
                    <span class="badge bg-success">Active</span>
                @else
                    <span class="badge bg-danger">Inactive</span>
                @endif
            </td>

            <td>
                <a href="{{ route('company.edit',$company->id) }}" class="btn btn-sm btn-warning">Edit</a>

                <button class="btn btn-sm btn-danger"
                        onclick="deleteCompany({{ $company->id }})">
                    Delete
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $companies->links() }}

@endsection

@push('scripts')
<script>
function deleteCompany(id)
{
    confirmDelete(function () {

        $.ajax({
            url: '/company/' + id,
            type: 'DELETE',
            success: function () {
                $('#row_' + id).remove();
                Swal.fire('Deleted!', 'Company deleted.', 'success');
            }
        });

    });
}
</script>
@endpush