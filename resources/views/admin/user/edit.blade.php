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
                        <a href="{{ url('admin/users') }}" class="btn btn-danger float-end">
                            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
                        </a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/update_user/' . $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="form-group col-md-4 mb-3">
                                <label for="created_at">Created At</label>
                                <p class="form-control">{{ $user->created_at->format('j F Y') }}</p>
                            </div>

                            <div class="form-group col-md-4 mb-3">
                                <label for="department">Department</label>
                                <p class="form-control">{{ $user->department->dpname }}</p>
                            </div>

                            <div class="form-group col-md-4 mb-3">
                                <label for="name">First Name</label>
                                <input
                                    v-model="user.name"
                                    type="text"
                                    id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    name="name"
                                    value="{{ old('name', $user->name) }}"
                                    autocomplete="name"
                                    autofocus
                                />
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4 mb-3">
                                <label for="last_name">Last Name</label>
                                <input
                                    v-model="user.last_name"
                                    type="text"
                                    id="last_name"
                                    class="form-control @error('last_name') is-invalid @enderror"
                                    name="last_name"
                                    value="{{ old('last_name', $user->last_name) }}"
                                    autocomplete="last_name"
                                    autofocus
                                />
                                @error('last_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4 mb-3">
                                <label for="gender">Gender</label>
                                <select
                                    v-model="user.gender"
                                    id="gender"
                                    class="form-control @error('gender') is-invalid @enderror"
                                    name="gender"
                                    autocomplete="gender"
                                    autofocus
                                >
                                    <option value="">--Select Gender--</option>
                                    <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                                @error('gender')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4 mb-3">
                                <label for="phone">Phone</label>
                                <input
                                    v-model="user.phone"
                                    type="text"
                                    id="phone"
                                    class="form-control @error('phone') is-invalid @enderror"
                                    name="phone"
                                    value="{{ old('phone', $user->phone) }}"
                                    autocomplete="phone"
                                    autofocus
                                />
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4 mb-3">
                                <label for="email">Email</label>
                                <input
                                    v-model="user.email"
                                    type="email"
                                    id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    value="{{ old('email', $user->email) }}"
                                    autocomplete="email"
                                />
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4 mb-3">
                                <label for="role_as">Update Role</label>
                                <select
                                    v-model="user.role_as"
                                    id="role_as"
                                    name="role_as"
                                    class="form-control @error('role_as') is-invalid @enderror"
                                >
                                    <option value="0" {{ old('role_as', $user->role_as) == '0' ? 'selected' : '' }}>User</option>
                                    <option value="1" {{ old('role_as', $user->role_as) == '1' ? 'selected' : '' }}>Admin</option>
                                    <option value="2" {{ old('role_as', $user->role_as) == '2' ? 'selected' : '' }}>Blogger</option>
                                </select>
                                @error('role_as')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4 mb-3">
                                <label for="password">Password</label>
                                <input
                                    v-model="user.password"
                                    id="password"
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password"
                                    value="{{ old('email', $user->password) }}"
                                    autocomplete="new-password"
                                />
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-4 mb-3">
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
