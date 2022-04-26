@extends('layouts.backend')
@section('title', 'Users')
@section('content')

<div class="container table-responsive py-5">

  @if(session('status'))
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
  @endif
  
    
      <div class="card col-md-8 shadow offset-2">
        <div class="card-header">
          <h4 class="m-0 font-weight-bold text-dark">
              View Users
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