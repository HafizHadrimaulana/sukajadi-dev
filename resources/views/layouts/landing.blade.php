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
        <link rel="stylesheet" href="{{ asset('css/chat-front.css') }}">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap4-theme@1.0.0/dist/select2-bootstrap4.min.css">        
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/pusher.min.js') }}"></script>
    <script src="{{ asset('js/jquery-cookie.min.js') }}"></script>
    <script src="{{ asset('js/pusher-front.js') }}"></script>


    @stack('scripts')
    
    <script>
        $(document).ready(function() {
            $('.timeline-gallery').each(function() { // the containers for all your galleries
                $(this).magnificPopup({
                    delegate: 'a', // the selector for gallery item
                    type: 'image',
                    gallery: {
                        enabled:true
                    }
                });
            });
        });
    </script>
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


        <div class="back-to-top">
            <button class="chat-button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                </svg>
            </button>
            {{-- CHAT HTML SNIPPET START --}}
            <div class="chat-container" style="display: none">
                <div class="card card-primary card-outline direct-chat direct-chat-primary">
                    <div class="card-header">
                        <h3 class="card-title">Direct Chat</h3>
                        <div class="card-tools">
                            <span title="3 New Messages" class="badge bg-primary">3</span>
                            <button type="button" class="btn btn-tool close-button">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="direct-chat-messages">

                            <div class="direct-chat-msg">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-left">Alexander Pierce</span>
                                    <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                </div>

                                <img class="direct-chat-img" src="../dist/img/user1-128x128.jpg"
                                    alt="Message User Image">

                                <div class="direct-chat-text">
                                    Is this template really for free? That's unbelievable!
                                </div>

                            </div>


                            <div class="direct-chat-msg right">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-right">Sarah Bullock</span>
                                    <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                </div>

                                <img class="direct-chat-img" src="../dist/img/user3-128x128.jpg"
                                    alt="Message User Image">

                                <div class="direct-chat-text">
                                    You better believe it!
                                </div>

                            </div>

                        </div>


                        <div class="direct-chat-contacts">
                            <ul class="contacts-list">
                                <li>
                                    <a href="#">
                                        <img class="contacts-list-img" src="../dist/img/user1-128x128.jpg"
                                            alt="User Avatar">
                                        <div class="contacts-list-info">
                                            <span class="contacts-list-name">
                                                Count Dracula
                                                <small class="contacts-list-date float-right">2/28/2015</small>
                                            </span>
                                            <span class="contacts-list-msg">How have you been? I was...</span>
                                        </div>

                                    </a>
                                </li>

                            </ul>

                        </div>

                    </div>

                    <div class="card-footer">
                        <form action="#" method="post">
                            <div class="input-group">
                                <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </span>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            {{-- CHAT HTML SNIPPET END --}}
        </div>
        

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