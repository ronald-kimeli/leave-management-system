<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- FAVICON -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('backend/images/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('backend/images/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('backend/images/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('backend/images/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('backend/images/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('backend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css" rel="stylesheet">

    <!-- datatables css -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <style>
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
            padding-left: 3px !important;
            padding-right: 0px !important;
        }
    </style>
</head>

<body id="body" class="{{ session('theme', 'light') }}">

    @include('layouts.inc.admin.admin-navbar')

    <div id="layoutSidenav">

        @include('layouts.inc.admin.admin-sidebar')

        <div id="layoutSidenav_content">
            <main>
                @yield('content')
            </main>
            
            @include('layouts.inc.admin.admin-footer')
        </div>
    </div>
    
    <script src="{{asset('backend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('backend/js/scripts.js')}}"></script>
    <script src="{{asset('backend/js/jquery-3.6.0.min.js')}}"></script>

    @if(session('status'))
        <script src="{{asset('backend/js/sweetalert.min.js')}}"></script>
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

            // Automatically expand the parent menu if a child link is active
            $('.nav-link.active').each(function () {
                $(this).closest('.collapse').addClass('show');
                $(this).closest('.collapse').prev('.nav-link').addClass('parent-expanded');
            });
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

            // Dark mode toggle functionality
            const darkModeToggle = document.getElementById('darkModeToggle');
            const body = document.getElementById('body');

            // Load the saved theme from localStorage
            if (localStorage.getItem('theme') === 'dark') {
                body.classList.add('dark-mode');
                darkModeToggle.innerHTML = '<i class="bi bi-sun"></i>';
            }

            // Toggle dark mode on button click
            darkModeToggle.addEventListener('click', function () {
                body.classList.toggle('dark-mode');
                const theme = body.classList.contains('dark-mode') ? 'dark' : 'light';
                localStorage.setItem('theme', theme);

                // Change button icon and text
                if (theme === 'dark') {
                    darkModeToggle.innerHTML = '<i class="bi bi-sun"></i>';
                } else {
                    darkModeToggle.innerHTML = '<i class="bi bi-moon"></i>';
                }
            });
        });
    </script>

</body>

</html>