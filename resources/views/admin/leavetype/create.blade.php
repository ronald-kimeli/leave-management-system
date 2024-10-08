@extends('layouts.backend')
@section('title', 'Add Leave Type')
@section('content')

<div class="container-fluid px-4">
    <h4 class="mt-4">Leave Type</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Leave Type</li>
    </ol>
    <div class="row mt-4">
        <div class="col-lg-12 col-xl-12 col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h4>Add Leave Type
                        <a href="{{ url('admin/leavetype') }}" class="btn btn-danger float-end">
                            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
                        </a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/add/leavetype') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="leave_type">Leave Type</label>
                            <input
                                v-model="leavetype.leave_type"
                                type="text"
                                id="leave_type"
                                name="leave_type"
                                class="form-control @error('leave_type') is-invalid @enderror"
                                value="{{ old('leave_type') }}"
                            />
                            @error('leave_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
