<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="{{ session('theme', 'light') }}">

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

        .bg-error {
            background-color: #dc3545 !important;
            color: #fff !important;
        }

        .text-error {
            color: #dc3545 !important;
        }
    </style>
</head>

<body id="body">

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

    @if(session('status') && session('status_code'))
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                let toastMessage = "{{ session('status') }}";
                let toastClass = "{{ session('status_code') }}";  // 'success', 'warning', 'danger', 'error
                let faviconPath = "{{ asset('backend/images/favicon-32x32.png') }}"; // Path to the favicon

                let toastHTML = `
                                    <div class="toast-container position-fixed top-0 end-0 p-3">
                                        <div id="liveToast" class="toast bg-${toastClass} text-white" role="alert" aria-live="assertive" aria-atomic="true">
                                            <div class="toast-header">
                                                <img src="${faviconPath}" class="rounded me-2" alt="Favicon" style="width: 20px; height: 20px;">
                                                <strong class="me-auto">Notification</strong>
                                                <small>Just now</small>
                                                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                            </div>
                                            <div class="toast-body">
                                                ${toastMessage}
                                            </div>
                                        </div>
                                    </div>
                                `;

                document.body.insertAdjacentHTML('beforeend', toastHTML);

                let toastElement = document.getElementById('liveToast');
                let toastInstance = new bootstrap.Toast(toastElement, { delay: 3000 });
                toastInstance.show();
            });
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

            // Function to update the <html> data-bs-theme attribute
            function updateTheme() {
                const theme = localStorage.getItem('theme') || 'light';
                document.documentElement.setAttribute('data-bs-theme', theme);
            }

            // Load the saved theme from localStorage and update the <html> attribute
            updateTheme();

            // Toggle dark mode on button click
            darkModeToggle.addEventListener('click', function () {
                const currentTheme = localStorage.getItem('theme');
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

                // Update localStorage with the new theme
                localStorage.setItem('theme', newTheme);

                // Update the <html> data-bs-theme attribute
                updateTheme();

                // Change button icon and text
                if (newTheme === 'dark') {
                    darkModeToggle.innerHTML = '<i class="bi bi-sun"></i>';
                } else {
                    darkModeToggle.innerHTML = '<i class="bi bi-moon"></i>';
                }
            });

        });
    </script>

</body>

</html>
