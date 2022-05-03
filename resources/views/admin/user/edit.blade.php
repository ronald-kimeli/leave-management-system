@extends('layouts.backend')
@section('title', 'Edit Users')
@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h4>Edit User
                        <a href="{{url('admin/users')}}" class="btn btn-danger btn-sm float-end rounded-pill"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>Back</a>
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

                    <div class="form-group mb-3">
                        <label for="">Create_At</label>
                        <p class="form-control">{{ $user->created_at->format('j F Y') }} </p>
                        <!-- ('j F Y') -->
                    </div>

                    <div class="form-group mb-3">
                        <label for="">Department</label>
                        <p class="form-control" selected> {{$user->department->dpname}}</p>
                    </div>

                    <form action="{{url('admin/update_user/'.$user->id)}}" method="POST">
                        @csrf
                        @method('PUT')


                        <div class="form-group mb-3">
                            <label for="">First_Name</label>
                            <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Last_Name</label>
                            <input type="text" class="form-control  @error('last_name') is-invalid @enderror" name="last_name" value="{{$user->last_name}}" required autocomplete="last_name" autofocus>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Gender</label>
                            <input type="text" class="form-control selectpicker  @error('gender') is-invalid @enderror" name="gender" value="{{$user->gender}}" required autocomplete="gender" autofocus>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Phone</label>
                            <input type="integer" class="form-control  @error('phone') is-invalid @enderror" name="phone" value="{{$user->phone}}" required autocomplete="phone" autofocus>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Email</label>
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Update Role</label>
                            <select name="role_as" class="selectpicker form-control">
                                <option value="0" {{ $user->role_as == '0' ? 'selected':'' }}>User</option>
                                <option value="1" {{ $user->role_as == '1' ? 'selected':'' }}>Admin</option>
                                <option value="2" {{ $user->role_as == '2' ? 'selected':'' }}>Blogger</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Password</label>
                            <input id="password" type="password" class="form-control  @error('password') is-invalid @enderror" value="{{$user->password}}" name="password" required autocomplete="new-password">
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection