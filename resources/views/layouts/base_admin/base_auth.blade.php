<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="assets/img/favicon.png">
        <title>@yield('judul') | Portal Sukajadi</title>

        <!-- Google Font: Source Sans Pro -->
        <link
            rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte3/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- icheck bootstrap -->
        <link
            rel="stylesheet"
            href="{{ asset('vendor/adminlte3/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte3/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">


    </head>

    <body class="hold-transition
    @if (Route::is('login') || Route::is('password.request') || Route::is('password.reset'))
    login-page
    @elseif (Route::is('register'))
    register-page
    @else
    login-page
    @endif">
    <div class="cs-preloader cs-white_bg cs-center">
    <div class="cs-preloader_in">
      <img src="assets/img/sukajadi-logo.svg" alt="Logo">
    </div>
  </div>
  <!-- Start Header Section -->
  <header class="cs-site_header cs-style1 cs-sticky-header cs-primary_color cs-white_bg">
    <div class="cs-main_header">
        <div class="container">
            <div class="cs-main_header_in">
                <div class="cs-main_header_left">
                    <a class="cs-site_branding cs-accent_color" href="welcome.blade.php">
                    <a href="#home" class="navbar-brand">
                       <span class="custom-text"><b>PORTAL</b>| Kecamatan</span>
                    </a>
                    </a>
                </div>
                <div class="cs-main_header_center">
                    <div class="cs-nav">
                        <ul class="cs-nav_list">
                            <li><a href="#home" class="cs-smoth_scroll">Beranda</a></li>
                            <li><a href="#about" class="cs-smoth_scroll">Kegiatan</a></li>
                            <li><a href="#feature" class="cs-smoth_scroll">Data</a></li>
                            <li><a href="#pricing" class="cs-smoth_scroll">Vaksinasi</a></li>
                            <li><a href="#news" class="cs-smoth_scroll">Posyandu</a></li>
                            <li><a href="#contact" class="cs-smoth_scroll">Rembug Warga</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Masukkan kode yang baru Anda berikan di sini -->
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                   @if (!Auth::check())
                   <a href="{{ route('login') }}" class="login-button text-sm login-text">
                    <span class="arrow"><b>➔</b></span><b>Login</b>
                  </a>
                  @endif
                   </div>
                <!-- Akhir kode yang baru Anda berikan -->
            </div>
        </div>
    </div>
</header>


        @yield('content')

        <!-- jQuery -->
        <script src="{{ asset('vendor/adminlte3/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('vendor/adminlte3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
          <script src="{{ asset('vendor/adminlte3/js/adminlte.min.js') }}"></script>
          <script src="assets/js/plugins/jquery-3.6.0.min.js"></script>
  <script src="assets/js/plugins/jquery.slick.min.js"></script>
  <script src="assets/js/plugins/jquery.counter.min.js"></script>
  <script src="assets/js/plugins/wow.min.js"></script>
  <script src="assets/js/main.js"></script>

    </body>
</html>
