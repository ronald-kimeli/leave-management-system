<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Online Leave Application</title>

    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('frontend/images/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('frontend/images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('frontend/images/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('frontend/images/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('frontend/images/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href=" {{asset('frontend/css/bootstrap5.css')}} ">

    <!-- Current navbar -->
    <link rel="stylesheet" href=" {{asset('frontend/css/style.css')}} ">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <!-- datatables css -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <style>
        /* body {
            background: #555655 !important;
        } */

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
            /* padding: 0 auto !important; It was commented before */
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
            }).then(function () {
                window.location.reload();
            })
        </script>

    @endif

    <!-- summernote js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function () {
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
        $(document).ready(function () {
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