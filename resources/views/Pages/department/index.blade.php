@extends('layouts.backend')

@section('content')

<div class="container py-5">
  
    <div class="card col-md-8 shadow offset-2">
      @include('Pages.department.message')
      <div class="card-header text-center">
        <h4>
          Department
          <a href="{{url('add-department')}}" class="btn btn-primary float-end">Add Department</a>
        </h4>
      </div>
      <div class="card-body table-responsive">
        <table id="mydataTable" class="table table-striped table-bordered " class="display nowrap" style="width:100%">
          <thead>
            <tr>
              <th>ID</th>
              <th>Department</th>
              <th>Status</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($departments as $empdata )
            <tr>
              <td>{{$empdata->id}}</td>
              <td>{{$empdata->dpname}}</td>
              <td>{{$empdata->status == '1' ? 'Approved' : 'Waiting Approval'}}</td>
              <td>
                <a href="{{url('edit_department/'.$empdata->id)}}" class="btn btn-primary">Edit</a>
              </td>
              <td>
                <!--  //first method -->
                <form action="{{url('delete_department/'.$empdata->id)}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
              </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>

    </div>
  

</div>

@endsection