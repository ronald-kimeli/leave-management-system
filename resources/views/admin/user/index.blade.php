@extends('layouts.backend')
@section('title', 'Users')
@section('content')

<div class="container  py-5">

  <!-- @if(session('status'))
  <script src="{{asset('backend/js/sweetalert.min.js')}}"></script>
  <script>
    swal({
      title: "{{session('status')}}",
      text: "",
      icon: "{{session('status_code')}}",
      button: "Ok!",
    }).then(function() {
      window.location.reload();
    })
  </script>
  @endif -->
  
    
      <div class="card col-md-12 shadow">
        <div class="card-header">
          <h4 class="m-0 font-weight-bold text-dark">
              View Users
              <a href="{{url('admin/add/user')}}" class="btn btn-danger float-end">Add User</a>
          </h4>
        </div>
        <div class="card-body table-responsive">
        <table id="mydataTable" class="table table-striped table-bordered " class="display nowrap" style="width:100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>First_Name</th>
                <th>Last_Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Role</th>
                <th>Edit</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $item )
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->last_name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->gender}}</td>
                <td>{{$item->phone}}</td>
                <td>{{$item->department->dpname}}</td>
                <td>{{$item->role_as == '1' ? 'Admin' : 'User' }}</td>
                <td>
                  <a href="{{url('admin/edit_user/'.$item->id)}}" class="btn btn-success">Edit</a>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
        
      </div>
    
</div>

@endsection