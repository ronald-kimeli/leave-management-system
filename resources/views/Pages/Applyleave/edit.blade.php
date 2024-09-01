@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h4>Leave Application Form
                        <a href="{{url('show/applyleave')}}" class="btn btn-danger btn-sm float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <div>{{$error}}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{url('update/applyleave/' . $data->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <!-- start User_id visually-hidden-->
                        <div class="form-group mb-3 visually-hidden">
                            <label for="">Select User:</label>
                            <input type="int" class="form-control @error('user_id') is-invalid @enderror" name="user_id"
                                value="{{$data->user_id}}" required autocomplete="user_id" autofocus>
                        </div>
                        <!-- end -->
                        <!-- $leavetype start -->
                        <div class="form-group mb-3">
                            <label for="">{{ __('Leave_Type:') }}</label>
                            <input type="int" class="form-control @error('leave_type_id') is-invalid @enderror"
                                name="leave_type_id" value="{{$data->leavetype->leave_type}}" required
                                autocomplete="leave_type_id" autofocus readonly>
                        </div>
                        <!-- end -->
                        <!-- start Description -->
                        <div class="form-group mb-3 ">
                            <label for="">{{ __('Description:') }}</label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror"
                                name="description" value="{{$data->description}}"
                                placeholder="State the reason for Application!" required
                                autofocus>{{$data->description}}</textarea>
                        </div>
                        <!-- end I removed id="mysummernote" on description -->
                        <!-- Leave_From_Start -->
                        <div class="form-group mb-3">
                            <label for="">{{ __('Leave_From:') }}</label>
                            <input type="date" class="form-control @error('leave_from') is-invalid @enderror"
                                name="leave_from" value="{{$data->leave_from}}" min=<?php echo date('Y-m-d'); ?>
                                required autofocus>
                        </div>
                        <!-- End -->
                        <!-- Leave_To_Start -->
                        <div class="form-group mb-3">
                            <label for="">{{ __('Leave_To:') }}</label>
                            <input type="date" class="form-control @error('leave_to') is-invalid @enderror"
                                name="leave_to" value="{{$data->leave_to}}" min=<?php echo date('Y-m-d'); ?> required
                                autofocus>
                        </div>
                        <!-- End -->
                        <!-- Submit form -->
                        <div class="form-group mb-3 rounded-pill">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                            </button>
                        </div>
                        <!-- End -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection