@extends('layouts.backend')
@section('title', 'Add User')
@section('content')

<div class="container-fluid px-4">
    <h4 class="mt-4">User</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">User</li>
    </ol>
    <div class="row mt-4">
        <div class="col-lg-12 col-xl-12 col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h4>Add User
                        <a href="{{url('admin/users')}}" class="btn btn-danger float-end"><- Back</a>
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

                    <form action="{{url('admin/add/user')}}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="">Name:</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                    name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name"
                                    autofocus>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Gender</label>
                                <select class="form-control selectpicker @error('gender') is-invalid @enderror"
                                    name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>
                                    <option value="">--Select Gender--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Phone</label>
                                <input type="integer" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Department</label>
                                <select id="department_id" type="text"
                                    class="form-control @error('department_id') is-invalid @enderror"
                                    name="department_id" value="{{ old('department_id') }}" required
                                    autocomplete="department_id" autofocus>
                                    <option value="">--Select Department--</option>
                                    @if($departments)
                                        @foreach($departments as $use)
                                            <option value="{{$use->id}}" {{$use->dpname == '$use->dpname' ? 'selected' : ''  }}>
                                                {{$use->dpname}}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Password_confirm</label>
                                <input type="password" class="form-control" name="password_confirmation" required
                                    autocomplete="new-password">
                            </div>

                            <!-- <div class="col-md-3 mb-3">
                    <label for="">Approve</label> // No need of approval while creating Leavetype
                    <input type="checkbox" name="status" value="{{ old('status') }}">
                </div> -->

                            <div class="col-lg-12 col-xl-12 col-md-12 mb-3">
                                <div class="form-group col-md-4 mb-3">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection