@extends('layouts.backend')
@section('title', 'Edit Users')
@section('content')

<div class="container py-5">
    <div class="card col-md-6 shadow offset-3">
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
                <label for="">First_Name</label>
                <p class="form-control">{{ $user->name }} </p>
            </div>

            <div class="form-group mb-3">
                <label for="">Last_Name</label>
                <p class="form-control">{{ $user->last_name }} </p>
            </div>

            <div class="form-group mb-3">
                <label for="">Email</label>
                <p class="form-control">{{ $user->email }} </p>
            </div>

            <div class="form-group mb-3">
                <label for="">Create_At</label>
                <p class="form-control">{{ $user->created_at->format('j F Y') }} </p> 
                <!-- ('j F Y') -->
            </div>

            <form action="{{url('admin/update_user/'.$user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="col-md-3 mb-3">
                    <label for="">Role_as</label>
                    <select name="role_as" class="selectpicker form-control">
                        <option value="0" {{ $user->role_as == '0' ? 'selected':'' }}>User</option>
                        <option value="1" {{ $user->role_as == '1' ? 'selected':'' }}>Admin</option>
                        <option value="2" {{ $user->role_as == '2' ? 'selected':'' }}>Blogger</option>
                    </select>
                    <!-- in the near future the blogger is needed as single user will be posting -->


                </div>
                <!-- <input type="checkbox" name="status" {{ $user->status == '1' ? 'checked':'' }} /> -->
                <div class="form-group col-md-6 mb-3">
                    <button type="submit" class="btn btn-primary">Update Role</button>
                </div>

            </form>
        </div>

    </div>
</div>
@endsection