@extends('layouts.backend')
@section('title', 'Category')
@section('content')

<div class="container py-5">

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
        <h4>View Category
          <a href="{{url('admin/add_category')}}" class="btn btn-primary btn-sm float-end">Add Category</a>
        </h4>
      </div>
      
      <div class="card-body table-responsive">
        <table id="mydataTable" class="table table-striped table-bordered " class="display nowrap" style="width:100%">
          <thead>
            <tr>
              <th>ID</th>
              <th>Category Name</th>
              <th>Image</th>
              <th>Status</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            @foreach($category as $item )
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->name}}</td>
              <td>
                <img src="{{ asset('uploads/category/'.$item->image)}}" width="50px" height="50px" alt="img">
              </td>
              <td>{{$item->status == '1' ? 'hidden' : 'shown' }}</td>
              <td>
                <a href="{{url('admin/edit_category/'.$item->id)}}" class="btn btn-success">Edit</a>
              </td>
              <td>
                <!--  //first method -->
                <form action="{{url('admin/delete_category/'.$item->id)}}" method="POST">
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