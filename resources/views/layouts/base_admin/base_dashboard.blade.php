<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="assets/img/sukajadi-logo.svg">
        <title>@yield('judul') | {{ config('app.name') }}</title>

        <!-- Google Font: Source Sans Pro -->
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte3/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte3/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap4-theme@1.0.0/dist/select2-bootstrap4.min.css">        
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        @yield('script_head')
        @stack('styles')
        <style>
            .is-invalid + .select2-container--bootstrap .select2-selection--single {
                border: 1px solid #dc3545 !important;
            }
        </style>
        <!-- jQuery -->
        <script src="{{ asset('vendor/adminlte3/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('vendor/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('vendor/adminlte3/js/adminlte.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2-bootstrap4-theme@1.0.0/Gruntfile.min.js"></script>
        
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        @stack('scripts')
    </head>
    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            @include('layouts.components.navbar')
 

            @include('layouts.components.sidebar')

            <div class="content-wrapper">
                @yield('content')
            </div>

            @include('layouts.components.footer')

            @include('layouts.components.control_sidebar')
        </div>
        <!-- ./wrapper -->
        <!-- AdminLTE for demo purposes -->
        {{-- <script src="../../dist/js/demo.js"></script> --}}

        @yield('script_footer')
        <script src="{{ asset('js/app.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('.select2').select2();
            });
        </script>
    </body>
</html>
