@extends('layouts.backend')

@section('title', 'Profile')

@section('content')
<div class="container-fluid px-4">
    <h4 class="mt-4">Profile</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Profile</li>
    </ol>
    <div class="row col-md-12 col-lg-12 col-xl-12">
        <!-- Profile Form Section -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Profile</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row col-md-12 col-lg-12 col-xl-12">
                            <!-- Name -->
                            <div class="form-group col-6 mb-3">
                                <label for="name">Name</label>
                                <input name="name" id="name" type="text" class="form-control"
                                    value="{{ old('name', $user->name) }}" />
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Last Name -->
                            <div class="form-group col-6 mb-3">
                                <label for="last_name">Last Name</label>
                                <input name="last_name" id="last_name" type="text" class="form-control"
                                    value="{{ old('last_name', $user->last_name) }}" />
                                @error('last_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-group col-sm-12 col-md-6 mb-3">
                                <label for="email">Email</label>
                                <input name="email" id="email" type="email" class="form-control"
                                    value="{{ old('email', $user->email) }}" />
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Profile Picture -->
                            <div class="form-group col-sm-12 col-md-6 mb-3">
                                <label for="profile_picture">Profile Picture</label>
                                <input name="profile_picture" id="profile_picture" type="file" class="form-control" />
                                @error('profile_picture')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Profile Picture Preview Section -->
        <div class="col-md-3 text-center">
            <div class="profile-picture-container">
                @if($user->profile_picture)
                    <img src="{{ asset('profile_pictures/' . $user->profile_picture) }}" class="img-fluid profile-picture"
                        alt="Profile Picture">
                @else
                    <img src="{{ asset('views/assets/img/avatar.png') }}" class="img-fluid profile-picture"
                        alt="Default Avatar">
                @endif
            </div>
        </div>
    </div>
</div>
@endsection