@extends('layouts.backend')
@section('title', 'Edit Leave_Type')
@section('content')

<div class="container py-5">
    <div class="card col-md-6 shadow offset-2">
        <div class="card-header">
            <h4>Edit Leave_Type
                <a href="{{url('admin/leavetype')}}" class="btn btn-danger btn-sm float-end rounded-pill"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>Back</a>
            </h4>
        </div>
        <div class="card-body">

            @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <div>{{$error}}</div>
                @endforeach
            </div>
            @endif
            <form action="{{url('admin/update_leavetype/'.$leavetype->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="">Leave Type</label>
                    <input type="text" name="leave_type" value="{{ $leavetype->leave_type }}" class="form-control">
                </div>

                <div class="col-md-3 mb-3">
                    <label for="">Status</label>
                    <select name="status" class="selectpicker form-control">
                        <option value="0" {{ $leavetype->status == '0' ? 'selected':'' }}>Waiting Approval</option>
                        <option value="1" {{ $leavetype->status == '1' ? 'selected':'' }}>Approve</option>          
                    </select> 
                </div>

                <div class="form-group col-md-6 mb-3">
                    <button type="submit" class="btn btn-primary">Update LeaveType</button>
                </div>

            </form>
        </div>

    </div>
</div>
@endsection