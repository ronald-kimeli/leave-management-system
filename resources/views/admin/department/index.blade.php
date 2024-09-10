@extends('layouts.backend')

@section('title', 'Departments')

@section('content')

<div class="container-fluid px-4">
    <h4 class="mt-4">Department</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Department</li>
    </ol>
    <div class="row mt-4">
        <div class="col-lg-12 col-xl-12 col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h4>
                        Departments
                        <a href="{{ url('admin/add/department') }}" class="btn btn-primary float-end">
                            <i class="bi bi-plus"></i> Add Department
                        </a>
                    </h4>
                </div>
                <div class="card-body table-responsive">
                    <table id="mydataTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Index</th>
                                <th>Department</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($departments as $index => $empdata)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $empdata->dpname }}</td>
                                    <td>
                                        {{ $empdata->status == '1' ? 'Approved' : 'Waiting Approval' }}
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/edit/department/' . $empdata->id) }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ url('admin/delete/department/' . $empdata->id) }}" method="POST" style="display:inline;">
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
