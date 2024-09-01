@extends('layouts.backend')
@section('title', 'Add Department')

@section('content')
<div class="container-fluid px-4">
    <h4 class="mt-4">Department</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Department</li>
    </ol>
    <div class="row mt-4">
        <div class="col-lg-12 col-xl-12 col-md-12">

            <div class="card shadow">
                <div class="card-header">
                    <h4>Create Department
                        <a href="{{url('admin/departments')}}" class="btn btn-danger float-end">BACK</a>
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
                    <form action="{{url('admin/store/department')}}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="">Department</label>
                            <input type="text" name="dpname" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">ADD</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection