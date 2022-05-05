@extends('layouts.backend')
@section('title', 'Edit Leave_Type')
@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
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
                    <form action="{{url('admin/update/leavetype/'.$leavetype->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="">Leave Type:</label>
                            <input type="text" name="leave_type" value="{{ $leavetype->leave_type }}" class="form-control">
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="">Approve:</label>
                            <select name="status" class="selectpicker form-control">
                                <option value="0" {{ $leavetype->status == '0' ? 'selected':'' }}>Waiting Approval</option>
                                <option value="1" {{ $leavetype->status == '1' ? 'selected':'' }}>Approved</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <button type="submit" class="btn btn-primary">UPDATE</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection