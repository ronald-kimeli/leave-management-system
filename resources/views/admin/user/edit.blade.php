@extends('layouts.backend')
@section('title', 'Edit User')
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
                    <h4>Edit User
                        <a href="{{url('admin/users')}}" class="btn btn-danger float-end"><i
                                class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back</a>
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

                    <form action="{{url('admin/update_user/' . $user->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="">Created At</label>
                                <p class="form-control">{{ $user->created_at->format('j F Y') }}</p>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Department</label>
                                <p class="form-control">{{ $user->department->dpname }}</p>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="">First Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                    name="last_name" value="{{ old('last_name', $user->last_name) }}" required
                                    autocomplete="last_name" autofocus>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Gender</label>
                                <select class="form-control @error('gender') is-invalid @enderror" name="gender"
                                    required autocomplete="gender" autofocus>
                                    <option value="">--Select Gender--</option>
                                    <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>
                                        Male</option>
                                    <option value="Female" {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" value="{{ old('phone', $user->phone) }}" required autocomplete="phone"
                                    autofocus>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email', $user->email) }}" required autocomplete="email">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Update Role</label>
                                <select name="role_as" class="form-control @error('role_as') is-invalid @enderror"
                                    required>
                                    <option value="0" {{ old('role_as', $user->role_as) == '0' ? 'selected' : '' }}>User
                                    </option>
                                    <option value="1" {{ old('role_as', $user->role_as) == '1' ? 'selected' : '' }}>Admin
                                    </option>
                                    <option value="2" {{ old('role_as', $user->role_as) == '2' ? 'selected' : '' }}>
                                        Blogger</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    autocomplete="new-password">
                            </div>

                            <div class="col-md-4 mb-3">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection