<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Online Leave Application</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href=" {{asset('frontend/css/bootstrap5.css')}} ">
    <link rel="stylesheet" href=" {{asset('frontend/css/custom.css')}} ">

    <!-- summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <!-- datatables css -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <style>
        body {
            background: #555655 !important;
        }
/* 
        a.navbar-brand {
            margin-left: -100px !important;
        }

        #navbarSupportedContent {
            margin-right: -100px !important;
        } */

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0px !important;
            margin-left: 0px !important;

        }

        div.dataTables_wrapper div.dataTables_length select {
            width: 50% !important;
        }

        div.dataTables_wrapper {
            width: 100% !important;
            margin: 0 auto !important;
            /* padding: 0 auto !important; */
            padding-left: 3px !important;
            padding-right: 0px !important;
        }
    </style>

</head>

<body>
    <div>
        @include('layouts.inc.navbar')


        @yield('content')
    </div>


    <script src="{{asset('frontend/js/bootstrap5.bundle.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-3.6.0.min.js')}}"></script>
    
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

    <!-- summernote js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#mysummernote").summernote({
                height: 150,
            });
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <!-- datatables js -->
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#mydataTable').DataTable({
                "scrollY": true,
                "scrollX": true
            });
        });
    </script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>