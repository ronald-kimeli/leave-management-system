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
                        <a href="{{ url('admin/users') }}" class="btn btn-danger float-end">
                            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
                        </a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/add/user') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="name">First Name:</label>
                                <input
                                    v-model="user.name"
                                    type="text"
                                    id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
                                    value="{{ old('name') }}"
                                    autocomplete="name"
                                    autofocus
                                />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="last_name">Last Name:</label>
                                <input
                                    v-model="user.last_name"
                                    type="text"
                                    id="last_name"
                                    class="form-control @error('last_name') is-invalid @enderror"
                                    name="last_name"
                                    value="{{ old('last_name') }}"
                                    autocomplete="last_name"
                                    autofocus
                                />
                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="gender">Gender:</label>
                                <select
                                    v-model="user.gender"
                                    id="gender"
                                    class="form-control @error('gender') is-invalid @enderror"
                                    name="gender"
                                    autocomplete="gender"
                                    autofocus
                                >
                                    <option value="">--Select Gender--</option>
                                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                                @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="phone">Phone:</label>
                                <input
                                    v-model="user.phone"
                                    type="text"
                                    id="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    name="phone"
                                    value="{{ old('phone') }}"
                                    autocomplete="phone"
                                    autofocus
                                />
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="email">Email:</label>
                                <input
                                    v-model="user.email"
                                    type="email"
                                    id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email') }}"
                                    autocomplete="email"
                                />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="department_id">Department:</label>
                                <select
                                    v-model="user.department_id"
                                    id="department_id"
                                    class="form-control @error('department_id') is-invalid @enderror"
                                    name="department_id"
                                    autocomplete="department_id"
                                    autofocus
                                >
                                    <option value="">--Select Department--</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>
                                            {{ $department->dpname }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('department_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="password">Password:</label>
                                <input
                                    v-model="user.password"
                                    type="password"
                                    id="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password"
                                    autocomplete="new-password"
                                />
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="password_confirmation">Confirm Password:</label>
                                <input
                                    v-model="user.password_confirmation"
                                    type="password"
                                    id="password_confirmation"
                                    class="form-control"
                                    name="password_confirmation"
                                    autocomplete="new-password"
                                />
                            </div>
                            <div class="col-lg-12 col-xl-12 col-md-12 mb-3">
                                <div class="form-group col-md-4 mb-3">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
