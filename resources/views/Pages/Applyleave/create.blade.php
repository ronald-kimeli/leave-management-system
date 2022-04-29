@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-header bg-info">
                    <center><h4>Leave Application Form
                    <a href="{{url('/')}}" class="btn btn-danger btn-sm float-end rounded-pill">Cancel</a>
                    </h4></center>
                    </div>
                    <div class="card-body bg-gray ">
                        @if(session('status'))
                        <script src="{{asset('frontend/js/sweetalert.min.js')}}"></script>
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

                        @if($errors->any())
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $error)
                            <div>{{$error}}</div>
                            @endforeach
                        </div>
                        @endif
                        <form action="{{url('add_applyleave')}}" method="POST">
                            @csrf
                            <!-- start Heading-->
                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label text-md-end"></label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control rounded-pill text-md-center" placeholder="APPLY LEAVE!" readonly required autofocus>
                                </div>
                            </div>
                            <!-- end -->
                            <!-- start User_id visually-hidden-->
                            <div class="row mb-3 visually-hidden">
                                <label for="" class="col-md-4 col-form-label text-md-end">{{ __('User_Id:') }}</label>
                                <div class="col-md-6">
                                <select type="int" class="form-control rounded-pill" name="user_id" required autocomplete="user_id" autofocus>

                                        @if($users)
                                        @foreach($users as $person)

                                        <option value="{{$person->id}}"@if($person->name.' '.$person->last_name== Auth::user()->name.' '.Auth::user()->last_name) selected @endif > {{$person->name.' '.$person->last_name}} </option>

                                        @endforeach
                                        @endif
                                    </select>
                                    <!-- <input type="int" class="form-control rounded-pill" name="user_id" value="{{Auth::user()->id}}" required autofocus> -->
                                </div>
                            </div>
                            <!-- end -->
                            <!-- $leavetype start -->
                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Leave_Type:') }}</label>
                                <div class="col-md-6">
                                    <select type="int" class="form-control rounded-pill" name="leave_type_id" required autocomplete="leave_type_id" autofocus>
                                        <option value="">--Select Leave_Type--</option>
                                        @if($leavetype)
                                        @foreach($leavetype as $use)
                                        <option value="{{$use->id}}" {{$use->leave_type == '$use->leave_type' ? 'selected' : ''}}> {{$use->leave_type}} </option>
                                        @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <!-- end -->
                            <!-- start Description -->
                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Description:') }}</label>
                                <div class="col-md-6">
                                    <textarea  type="text" class="form-control border-rounded" name="description" placeholder="State the reason for Application!" required autofocus></textarea>
                                </div>
                            </div>
                            <!-- end I removed id="mysummernote" on description -->
                            <!-- Leave_From_Start -->
                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Leave_From:') }}</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control border-rounded" name="leave_from" min=<?php echo date('Y-m-d'); ?> required autofocus>
                                </div>
                            </div>
                            <!-- End -->
                            <!-- Leave_To_Start -->
                            <div class="row mb-3">
                                <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Leave_To:') }}</label>
                                <div class="col-md-6">
                                    <input type="date" class="form-control border-rounded " name="leave_to" min=<?php echo date('Y-m-d'); ?> required autofocus>
                                </div>
                            </div>
                            <!-- End -->
                            <!-- Submit form -->
                            <div class="row mb-0 rounded-pill">
                                <div class="col-md-6 offset-md-4 ">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit!') }}
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
<!-- style="padding-top:100px !important" -->