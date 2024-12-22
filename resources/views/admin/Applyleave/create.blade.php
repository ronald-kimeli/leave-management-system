@extends('layouts.backend')
@section('title', 'Apply Leave')
@section('content')

<div class="container-fluid px-4">
    <h4 class="mt-4">Leave Application</h4>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item">Apply Leave</li>
    </ol>
    <div class="row mt-4">
        <div class="col-lg-12 col-xl-12 col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h4>Leave Application Form
                        <a href="{{ url('admin/applyleave') }}" class="btn btn-danger btn-sm float-end">
                            <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back
                        </a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/add/applyleave') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Select User -->
                            <div class="form-group col-md-4 mb-3">
                                <label for="user_id">Select User:</label>
                                <select id="user_id" class="form-control @error('user_id') is-invalid @enderror"
                                    name="user_id" value="{{ old('user_id') }}" autocomplete="user_id" autofocus>
                                    @if($users)
                                        @foreach($users as $person)
                                            <option value="{{ $person->id }}" {{ $person->id == Auth::user()->id ? 'selected' : '' }}>
                                                {{ $person->name . ' ' . $person->last_name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('user_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Leave Type -->
                            <div class="form-group col-md-4 mb-3">
                                <label for="leave_type_id">{{ __('Leave Type:') }}</label>
                                <select id="leave_type_id"
                                    class="form-control @error('leave_type_id') is-invalid @enderror"
                                    name="leave_type_id" value="{{ old('leave_type_id') }}" autocomplete="leave_type_id"
                                    autofocus>
                                    <option value="">--Select Leave Type--</option>
                                    @if($leavetype)
                                        @foreach($leavetype as $type)
                                            <option value="{{ $type->id }}" {{ $type->id == old('leave_type_id') ? 'selected' : '' }}>
                                                {{ $type->leave_type }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('leave_type_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Leave From -->
                            <div class="form-group col-md-4 mb-3">
                                <label for="leave_from">{{ __('Leave From:') }}</label>
                                <input id="leave_from" type="date"
                                    class="form-control @error('leave_from') is-invalid @enderror" name="leave_from"
                                    value="{{ old('leave_from') }}" min="{{ date('Y-m-d') }}" autofocus />
                                @error('leave_from')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Leave To -->
                            <div class="form-group col-md-4 mb-3">
                                <label for="leave_to">{{ __('Leave To:') }}</label>
                                <input id="leave_to" type="date"
                                    class="form-control @error('leave_to') is-invalid @enderror" name="leave_to"
                                    value="{{ old('leave_to') }}" min="{{ date('Y-m-d') }}" autofocus />
                                @error('leave_to')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="form-group col-md-4 mb-3">
                                <label for="description">{{ __('Description:') }}</label>
                                <textarea id="description"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    placeholder="State the reason for Application!"
                                    autofocus>{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <!-- Submit Button -->
                        <div class="form-group col-md-4 mb-3">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Apply') }}
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection