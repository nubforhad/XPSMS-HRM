@extends('layouts.app')

@section('title','Attendance')

@section('content')

<div class="page-wrapper">
    <div class="page-content">

        <div class="card">
            <div class="card-header">
                <h4>Employee Attendance</h4>
            </div>

            <div class="card-body">

                <div class="row">

                    <div class="col-md-4">
                        <label>Finger ID</label>

                        <input
                            type="text"
                            id="finger_id"
                            class="form-control"
                            placeholder="Enter Finger ID"
                            autofocus>
                    </div>

                    <div class="col-md-2 d-flex align-items-end">

                        <button
                            class="btn btn-success w-100"
                            onclick="scanFinger()">

                            <i class="bx bx-fingerprint"></i>

                            Scan Finger

                        </button>

                    </div>

                </div>

                <hr>

                <div class="table-responsive">

                    <table class="table table-bordered table-striped">

                        <thead class="table-dark">

                        <tr>

                            <th>#</th>
                            <th>Name</th>
                            <th>Finger ID</th>
                            <th>Date</th>
                            <th>In Time</th>
                            <th>Out Time</th>
                            <th>Working Hours</th>
                            <th>Late</th>
                            <th>Status</th>

                        </tr>

                        </thead>

                        <tbody>

                        @forelse($attendances as $key=>$row)

                            <tr>

                                <td>{{ $attendances->firstItem()+$key }}</td>

                                <td>{{ $row->employee->name ?? '' }}</td>

                                <td>{{ $row->employee->finger_id ?? '' }}</td>

                                <td>{{ $row->date }}</td>

                                <td>{{ $row->in_time }}</td>

                                <td>{{ $row->out_time }}</td>

                                <td>{{ $row->working_hours }}</td>

                                <td>{{ $row->late_minutes }} Min</td>

                                <td>

                                    @if($row->status=='present')

                                        <span class="badge bg-success">

                                            Present

                                        </span>

                                    @elseif($row->status=='late')

                                        <span class="badge bg-warning">

                                            Late

                                        </span>

                                    @else

                                        <span class="badge bg-danger">

                                            Absent

                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="9" class="text-center">

                                    No Attendance

                                </td>

                            </tr>

                        @endforelse

                        </tbody>

                    </table>

                </div>

                {{ $attendances->links() }}

            </div>

        </div>

    </div>
</div>

@endsection

@push('scripts')

<script>

$.ajaxSetup({

    headers:{
        'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
    }

});

function scanFinger(){

    let finger_id=$("#finger_id").val();

    if(finger_id==""){

        Swal.fire(
            'Warning',
            'Please Enter Finger ID',
            'warning'
        );

        return;
    }

    $.ajax({

        url:"{{ route('attendance.scan') }}",

        type:"POST",

        data:{
            finger_id:finger_id
        },

        success:function(res){

            Swal.fire({

                icon:'success',

                title:res.employee,

                text:res.message

            }).then(()=>{

                location.reload();

            });

        },

        error:function(xhr){

            Swal.fire({

                icon:'error',

                title:'Error',

                text:xhr.responseJSON.message

            });

        }

    });

}

$("#finger_id").keypress(function(e){

    if(e.which==13){

        scanFinger();

    }

});

</script>

@endpush