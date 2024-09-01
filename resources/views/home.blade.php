@extends('layouts.frontend')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if(session('status'))
                        <script src="{{asset('frontend/js/sweetalert.min.js')}}"></script>
                        <script>
                            swal({
                                title: "{{session('status')}}",
                                text: "",
                                icon: "{{session('status_code')}}",
                                button: "Ok!",
                            });
                        </script>

                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection