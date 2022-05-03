@extends('layouts.backend')
@section('title', 'Add Department')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h4>Add Department
                        <a href="{{url('departments')}}" class="btn btn-danger float-end">BACK</a>
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
                    <form action="{{url('store/department')}}" method="POST">
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