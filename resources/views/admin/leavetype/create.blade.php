@extends('layouts.backend')
@section('title', 'Add Leave Type')
@section('content')

<div class="container py-5">
    <div class="card col-md-8 shadow offset-2">
        <div class="card-header">
            <h4>Add Leave Type
                <a href="{{url('admin/leavetype')}}" class="btn btn-danger float-end">BACK</a>
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
            <form action="{{url('admin/add_leavetype')}}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="">Leave Type</label>
                    <input type="text" name="leave_type" class="form-control">
                </div>

                <div class="col-md-3 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status">
                </div>

                <div class="form-group col-md-6 mb-3">
                    <button type="submit" class="btn btn-primary">Save Leave</button>
                </div>

            </form>
        </div>

    </div>
</div>
@endsection