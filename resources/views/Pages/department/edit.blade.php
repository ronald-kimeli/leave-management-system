@extends('layouts.backend')

@section('content')
<div class="container py-5">
    <div class="card col-md-6 shadow offset-3">
        <div class="card-header">
            <h4>Edit Department
                <a href="{{url('departments')}}" class="btn btn-danger btn-sm float-end rounded-pill"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>Back</a>
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

            <form action="{{url('update/department/'.$department->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="">Department</label>
                    <input type="text" name="dpname" value="{{$department->dpname}}" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Approve_Department</label>
                        <select name="status" class="selectpicker form-control">
                        <option value="0" {{ $department->status == '0' ? 'selected':'' }}>Waiting Approval</option>
                        <option value="1" {{ $department->status == '1' ? 'selected':'' }}>Approve</option>          
                    </select> 
                </div>

                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary rounded-pill">Update</button>
                </div>

            </form>
        </div>

    </div>
</div>
@endsection