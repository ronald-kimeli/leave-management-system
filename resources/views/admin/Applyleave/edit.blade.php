@extends('layouts.backend')
@section('title', 'Edit Leave')
@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h4>Approve||Reject
                        <a href="{{url('admin/applyleave')}}" class="btn btn-danger btn-sm float-end rounded-pill"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>Back</a>
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

                    <form action="{{url('admin/update/applyleave/'.$data->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                             <!-- start User_id visually-hidden-->
                             <div class="form-group mb-3">
                            <label for="">Select User:</label>
                            <input type="int" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{$data->User->name.' '.$data->User->last_name}}" required autocomplete="user_id" autofocus readonly>
                        </div>
                        <!-- end -->
                        <!-- $leavetype start -->
                        <div class="form-group mb-3">
                            <label for="">{{ __('Leave_Type:') }}</label>
                            <input type="int" class="form-control @error('leave_type_id') is-invalid @enderror" name="leave_type_id" value="{{$data->leavetype->leave_type}}" required autocomplete="leave_type_id" autofocus readonly>
                        </div>
                        <!-- end -->
                        <!-- start Description -->
                        <div class="form-group mb-3">
                            <label for="">{{ __('Description:') }}</label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description" placeholder="State the reason for Application!" required autofocus>{{$data->description}}</textarea>
                        </div>
                        <!-- end I removed id="mysummernote" on description -->
                        <!-- Leave_From_Start -->
                        <div class="form-group mb-3">
                            <label for="">{{ __('Leave_From:') }}</label>
                            <input type="date" class="form-control @error('leave_from') is-invalid @enderror" name="leave_from" value="{{$data->leave_from}}" min=<?php echo date('Y-m-d'); ?> required autofocus>
                        </div>
                        <!-- End -->
                        <!-- Leave_To_Start -->
                        <div class="form-group mb-3">
                            <label for="">{{ __('Leave_To:') }}</label>
                            <input type="date" class="form-control @error('leave_to') is-invalid @enderror" name="leave_to" value="{{$data->leave_to}}" min=<?php echo date('Y-m-d'); ?> required autofocus>
                        </div>
                        <!-- End -->
                        <div class="form-group mb-3">
                            <label for="">{{ __('Update Status:') }}</label>
                            <!-- <input type="int" name="status" value="{{$data->status }}"  /> -->
                            <select name="status" class="selectpicker form-control">
                                <option value="0" {{ $data->status == '0' ? 'selected':'' }}>--Update Status--</option>
                                <option value="1" {{ $data->status == '1' ? 'selected':'' }}>Accepted</option>
                                <option value="2" {{ $data->status == '2' ? 'selected':'' }}>Rejected</option>
                            </select>
                        </div>

                        <!-- Submit form -->
                        <div class="row mb-0 rounded-pill">
                            <div class="offset-md-4 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Changes!') }}
                                </button>
                            </div>
                        </div>
                        <!-- End -->


                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection