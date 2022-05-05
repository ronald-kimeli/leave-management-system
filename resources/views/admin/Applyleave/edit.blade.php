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