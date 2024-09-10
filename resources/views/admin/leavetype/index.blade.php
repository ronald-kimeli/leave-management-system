@extends('layouts.backend')
@section('title', 'Leave Type')
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
                    <h4>Leave Type
                        <a href="{{url('admin/add/leavetype')}}" class="btn btn-primary btn-sm float-end">Add Leave
                            Type</a>
                    </h4>
                </div>
                <div class="card-body table-responsive">
                    <table id="mydataTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Index</th>
                                <th>Leave Type</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($leavetype as $index => $item)
                                <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$item->leave_type}}</td>
                                    <td>
                                        @if($item->status == '1')
                                            <span class="badge bg-success">Approved</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Waiting Approval</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url('admin/edit/leavetype/' . ($item->id))}}"
                                            class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{url('admin/delete/leavetype/' . ($item->id))}}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm" type="submit">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
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