@extends('layouts.backend')
@section('title', 'Users')
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
          <h4 class="m-0 font-weight-bold text-dark">
            Users
            <a href="{{url('admin/add/user')}}" class="btn btn-primary float-end">Add User</a>
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
                <!-- <th>Delete</th> -->
              </tr>
            </thead>
            <tbody>
              @foreach($users as $item)
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
            <a href="{{url('admin/user/' . $item->id . '/edit')}}" class="btn btn-success">Edit</a>
          </td>
          <!-- <td>
             Deleting User its not required it brings error on relationships
            <form action="{{url('admin/delete/user/'.$item->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button>
            </form>
          </td> -->
          </tr>
        @endforeach

            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>

@endsection


