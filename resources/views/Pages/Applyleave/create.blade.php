@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h4>Leave Application Form
                        <a href="{{url('/')}}" class="btn btn-danger btn-sm float-end rounded-pill">Cancel</a>
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
                    <form action="{{url('add/applyleave')}}" method="POST">
                        @csrf
                        <!-- start User_id visually-hidden-->
                        <div class="form-group mb-3 visually-hidden">
                            <label for="">Select User:</label>
                            <select type="int" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{ old('user_id') }}" required autocomplete="user_id" autofocus>

                                @if($users)
                                @foreach($users as $person)

                                <option value="{{$person->id}}" @if($person->name.' '.$person->last_name== Auth::user()->name.' '.Auth::user()->last_name) selected @endif > {{$person->name.' '.$person->last_name}} </option>

                                @endforeach
                                @endif
                            </select>
                            <!-- <input type="int" class="form-control rounded-pill" name="user_id" value="{{Auth::user()->id}}" required autofocus> -->
                        </div>
                        <!-- end -->
                        <!-- $leavetype start -->
                        <div class="form-group mb-3">
                            <label for="">{{ __('Leave_Type:') }}</label>
                            <select type="int" class="form-control @error('leave_type_id') is-invalid @enderror" name="leave_type_id" value="{{ old('leave_type_id') }}" required autocomplete="leave_type_id" autofocus>
                                <option value="">--Select Leave_Type--</option>
                                @if($leavetype)
                                @foreach($leavetype as $use)
                                <option value="{{$use->id}}" {{$use->leave_type == '$use->leave_type' ? 'selected' : ''}}> {{$use->leave_type}} </option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <!-- end -->
                        <!-- start Description -->
                        <div class="form-group mb-3">
                            <label for="">{{ __('Description:') }}</label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="State the reason for Application!" required autofocus></textarea>
                        </div>
                        <!-- end I removed id="mysummernote" on description -->
                        <!-- Leave_From_Start -->
                        <div class="form-group mb-3">
                            <label for="">{{ __('Leave_From:') }}</label>
                            <input type="date" class="form-control @error('leave_from') is-invalid @enderror" name="leave_from" value="{{ old('leave_from') }}" min=<?php echo date('Y-m-d'); ?> required autofocus>
                        </div>
                        <!-- End -->
                        <!-- Leave_To_Start -->
                        <div class="form-group mb-3">
                            <label for="">{{ __('Leave_To:') }}</label>
                            <input type="date" class="form-control @error('leave_to') is-invalid @enderror" name="leave_to" value="{{ old('leave_to') }}" min=<?php echo date('Y-m-d'); ?> required autofocus>
                        </div>
                        <!-- End -->
                        <!-- Submit form -->
                        <div class="form-group mb-3 rounded-pill">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Apply') }}
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