@extends('layouts.backend')
@section('title', 'Apply_leave')
@section('content')

<div class="container py-5">
    <div class="card col-md-8 shadow offset-2">
        <div class="card-header">
            <h4>Add Applyleave
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

                <!-- start User_id -->
                <div class="row mb-3">
                    <label for="" class="col-md-4 col-form-label text-md-end">{{ __('User_Id:') }}</label>

                    <div class="col-md-6">
                        <p class="form-control rounded-pill">{{$data->User->name.' '.$data->User->last_name}}</p>
                    </div>
                </div>
                <!-- end -->

                <!-- $leavetype start -->
                <div class="row mb-3">
                    <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Leave_Type:') }}</label>

                    <div class="col-md-6">
                    <p class="form-control rounded-pill">{{$data->leavetype->leave_type}}</p>
                    </div>
                </div>
                <!-- end -->

                <!-- start Description -->
                <div class="row mb-3">
                    <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Description:') }}</label>

                    <div class="col-md-6">
                    <p class="form-control rounded-pill" id="mysummernote">{{$data->description}}</p>
                    </div>
                </div>
                <!-- end -->

               <!-- Leave_From_Start -->
                <div class="row mb-3">
                    <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Leave_From:') }}</label>

                    <div class="col-md-6">
                    <p class="form-control rounded-pill" >{{$data->leave_from}}</p>
                    </div>
                </div>
                <!-- End -->

                <!-- Leave_To_Start -->
                <div class="row mb-3">
                    <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Leave_To:') }}</label>

                    <div class="col-md-6">
                    <p class="form-control rounded-pill" >{{$data->leave_to}}</p>
                    </div>
                </div>
                <!-- End -->
                <form action="{{url('admin/update_applyleave/'.$data->id)}}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <label for="" class="col-md-4 col-form-label text-md-end">{{ __('Status:') }}</label>
                    <div class="col-md-6 ">
                        <!-- <input type="int" name="status" value="{{$data->status }}"  /> -->
                        <select name="status" class="selectpicker form-control">
                            <option value="0" {{ $data->status == '0' ? 'selected':'' }}>--Update Status--</option>
                            <option value="1" {{ $data->status == '1' ? 'selected':'' }}>Accept</option>
                            <option value="2" {{ $data->status == '2' ? 'selected':'' }}>Reject</option>
                        </select>
                    </div>

                    <!-- Submit form -->
                    <div class="row mb-0 rounded-pill">
                        <div class="col-md-6 offset-md-4 ">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Save Changes!') }}
                            </button>
                        </div>
                    </div>
                    <!-- End -->


            </form>
        </div>

    </div>
</div>
@endsection