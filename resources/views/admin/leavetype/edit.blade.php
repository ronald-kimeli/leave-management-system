@extends('layouts.backend')
@section('title', 'Edit Leave Type')
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
                    <h4>Edit Leave Type
                        <a href="{{ url('admin/leavetype') }}" class="btn btn-danger btn-sm float-end">
                            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
                        </a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/update/leavetype/' . $leavetype->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="leave_type">Leave Type:</label>
                            <input
                                v-model="leavetype.leave_type"
                                type="text"
                                id="leave_type"
                                name="leave_type"
                                value="{{ old('leave_type', $leavetype->leave_type) }}"
                                class="form-control @error('leave_type') is-invalid @enderror"
                            />
                            @error('leave_type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="status">Status:</label>
                            <select
                                v-model="leavetype.status"
                                id="status"
                                name="status"
                                class="form-control @error('status') is-invalid @enderror"
                            >
                                <option value="0" {{ old('status', $leavetype->status) == '0' ? 'selected' : '' }}>
                                    Waiting Approval
                                </option>
                                <option value="1" {{ old('status', $leavetype->status) == '1' ? 'selected' : '' }}>
                                    Approved
                                </option>
                            </select>
                            @error('status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
