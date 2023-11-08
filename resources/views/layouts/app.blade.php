<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="assets/img/sukajadi-logo.svg">
        <title>@yield('judul') | {{ config('app.name') }}</title>
        <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-Bd1wty3WALnARDD67cRwdo5p0PD60fphF7Q1F9tn8u6d9RE/0Qnm8U69l7c1Zn2Q" crossorigin="anonymous"> --}}

        
        {{-- <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css">
        <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script> --}}

    </head>

    <body class="hold-transition cs-hero cs-style1 cs-bg 
    @if (Route::is('login') || Route::is('password.request') || Route::is('password.reset'))
    login-page
    @elseif (Route::is('register'))
    register-page
    @else
    login-page
    @endif" data-src="#">
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
                        <a class="cs-site_branding cs-accent_color" >
                           <span href="/" class="custom-text"><b>PORTAL</b> | Kecamatan</span>
                        </a>
                    </div>
                    <div class="cs-main_header_center">
                        <div class="cs-nav">
                            <ul class="cs-nav_list">
                              <li><a href="/" class="cs-smoth_scroll"><b>Beranda</b></a></li>
                              <li><a href="{{ route('kegiatan') }}" class="cs-smoth_scroll"><b>Kegiatan</b></a></li>
                              <li><a href="{{ route('data') }}" class="cs-smoth_scroll"><b>Data</b></a></li>
                              <li><a href="{{ route('posyandu') }}" class="cs-smoth_scroll"><b>Posyandu</b></a></li>
                              <li><a href="{{ route('rembug-warga') }}" class="cs-smoth_scroll"><b>Rembug Warga</b></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Masukkan kode yang baru Anda berikan di sini -->
                    <div class="cs-main_header_right">
                      <div class="cs-toolbox">
                       @if (!Auth::check())
                       <a href="{{ route('login') }}" class="cs-btn cs-color1 cs-modal_btn">
                        <span class="cs-btn cs-color1 cs-modal_btn" data-modal="login">Login</span>
                      </a>
                      @endif
                      </div>
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
