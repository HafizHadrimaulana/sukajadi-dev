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
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap4-theme@1.0.0/dist/select2-bootstrap4.min.css">        
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.10/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        @yield('script_head')
        @stack('styles')
        <link rel="stylesheet" href="{{ asset('css/chat-front.css') }}">
        <style>
            .is-invalid + .select2-container--bootstrap .select2-selection--single {
                border: 1px solid #dc3545 !important;
            }

            .timeline-gallery{
                display: flex;
                flex-wrap: wrap;
            }
            .timeline-gallery a{
                width: 100px;
                height: 100px;
                overflow: hidden;
                margin-right: 10px;
                border-radius: 10px;
                margin-bottom: 10px;
            }

            .timeline-gallery a:first-child {
                margin-left: 0;
            }
            .timeline-gallery img{
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            
            .select2-close-mask{
                z-index: 2099;
            }

            .select2-dropdown{
                z-index: 3051;
            }
            .select2.select2-container{    
                width: 100% !important;
            }

            .dropdown-menu-notif {
                min-width: 18rem;
            }
        </style>
        <!-- jQuery -->
        <script src="{{ asset('vendor/adminlte3/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('vendor/adminlte3/js/adminlte.min.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2-bootstrap4-theme@1.0.0/Gruntfile.min.js"></script>
        
        <script src="https://cdn.datatables.net/1.13.10/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.10/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        
            
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/8.3.0/pusher.min.js" integrity="sha512-tXL5mrkSoP49uQf2jO0LbvzMyFgki//znmq0wYXGq94gVF6TU0QlrSbwGuPpKTeN1mIjReeqKZ4/NJPjHN1d2Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('js/jquery-cookie.min.js') }}"></script>
        <script>
            
            var pusher = new Pusher('e17b7d08ee03ee73f23f', {
                    cluster: 'ap1'
                });
        </script>
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

                $('.timeline-gallery').magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    gallery:{
                        enabled:true
                    }
                });

                getNotif();
                var notif_channel = pusher.subscribe('notif-update');
                notif_channel.bind('notif', function (response) {
                    getNotif();
                });
            });

            function getNotif()
            {
                
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "GET",
                    url: "/admin/notif",
                    cache: false,
                    success: function (response) {
                        // console.log(response)
                        

                        $("#notificationsDropdown").find('.badge').html(response.total);
                        $("#notif-total").html(response.total +' Notifikasi');
                        $("#notif-suratMasuk").html(response.surat_masuk);
                        $("#notif-suratKeluar").html(response.surat_keluar);
                        $("#notif-pengajuan").html(response.pengajuan);
                        $("#notif-chat").html(response.livechat);
                    }
                });
            }
        </script>
    </body>
</html>
