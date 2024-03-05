<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="assets/img/sukajadi-logo.svg">
        <title>@yield('judul') | {{ config('app.name') }}</title>

        <!-- Google Font: Source Sans Pro -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte3/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte3/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

        @yield('script_head')
        @stack('styles')

        <!-- jQuery -->
        <script src="{{ asset('vendor/adminlte3/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('vendor/adminlte3/js/adminlte.min.js') }}"></script>
    
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        @stack('scripts')
    </head>
    <body class="hold-transition sidebar-mini">
        <!-- Site wrapper -->

        @yield('content')
        
        @yield('script_footer')
    </body>
</html>
