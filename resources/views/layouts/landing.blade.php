<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Portal | </title>
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte3/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('vendor/adminlte3/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap4-theme@1.0.0/dist/select2-bootstrap4.min.css">        
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


        @stack('styles')
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
 
<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="{{ url('/') }}" class="navbar-brand">
                    <b>PORTAL</b> | KEWILAYAHAN
                </a>
                <div class="collapse navbar-collapse order-3" id="navbarCollapse">

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kegiatan') }}" class="nav-link">Kegiatan</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="nav-link dropdown-toggle">Data</a>
                            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                                <li><a href="{{ route('data.penghargaan.index') }}" class="dropdown-item">Penghargaan </a></li>
                                <li><a href="{{ route('data.sarpras.index') }}" class="dropdown-item">Sarana & Prasarana</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <div class="float-right order-3">
                    <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                        data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a href="{{ route('login') }}" class="btn btn-primary btn-sm">
                        Login
                    </a>
                </div>
            </div>
        </nav>
        <div class="content-wrapper">
            {{ $slot }}
        </div>

        <aside class="control-sidebar control-sidebar-dark">

        </aside>


        <footer class="main-footer">
                <div class="container">
                    <div class="row" style="padding:10px 0 30px 0;line-height:2.0em;background:#fff">
                    <div class="col-md-4">
                      <h3><b>Kantor Kecamatan Sukajadi</b></h3>
                      Jl. Sukamulya No. 4<br>
                      Kota Bandung 40161
                    </div>
                    <div class="col-md-4">
                      <h3> </h3>
                      <li><a class="text-black" href="https://www.facebook.com/people/kec_sukajadi/100068761213783/" target="blank"><i class="fa fa-facebook"></i> Kecamatan Sukajadi</a> <br></li>
                      <li><a class="text-black" href="https://twitter.com/Kec_Sukajadi" target="blank"><i class="fa fa-twitter"></i> Kec_Sukajadi</a><br></li>
                      <li><a class="text-black" href="https://instagram.com/Kec_Sukajadi" target="blank"><i class="fa fa-instagram"></i> Kec_Sukajadi</a></li>
                    </div>
                    <div class="col-md-4">
                      <h3> </h3>
                      <b>Whatsapp</b>: 0821-1871-7109<br>
                      <b>email</b>: kecamatansukajadi04@gmail.com<br>
                      
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>

</html>
