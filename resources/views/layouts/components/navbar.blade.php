<link
rel="stylesheet"
href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('vendor/adminlte3/plugins/fontawesome-free/css/all.min.css') }}">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('vendor/adminlte3/css/adminlte.min.css') }}">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/slick.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-Bd1wty3WALnARDD67cRwdo5p0PD60fphF7Q1F9tn8u6d9RE/0Qnm8U69l7c1Zn2Q" crossorigin="anonymous"> --}}
<script src="assets/js/plugins/jquery-3.6.0.min.js"></script>
<script src="assets/js/plugins/jquery.slick.min.js"></script>
<script src="assets/js/plugins/jquery.counter.min.js"></script>
<script src="assets/js/plugins/wow.min.js"></script>
<script src="assets/js/main.js"></script>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand cs-site-header cs-style1 cs-sticky-header cs-primary_color cs-white_bg">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
            <i class="fa fa-bell"></i>
            <span class="badge badge-warning">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                @if (Auth::user()->user_image)
                <img
                    src="{{ Auth::user()->user_image }}"
                    class="user-image img-circle elevation-2"
                    alt="User Imagess">
                @else
                <img
                    src="{{ asset('vendor/adminlte3/img/user2.png') }}"
                    class="user-image img-circle elevation-2"
                    alt="User Imagess">
                    @endif
                    <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-primary">
                        @if (Auth::user()->user_image)
                        <img
                        src="{{ Auth::user()->user_image }}"
                        class="img-circle elevation-2"
                        alt="User Imagess">
                        @else
                        <img
                            src="{{ asset('vendor/adminlte3/img/user2.png') }}"
                            class="img-circle elevation-2"
                            alt="User Imagess">
                            @endif

                            <p>
                                {{ Auth::user()->name }}
                                <small>Bergabung pada @DateIndo(Auth::user()->created_at)</small>
                            </p>
                        </li>
                        <!-- Menu Body -- <li class="user-body"> <div class="row"> <div class="col-4
                        text-center"> <a href="#">Followers</a> </div> <div class="col-4 text-center">
                        <a href="#">Sales</a> </div> <div class="col-4 text-center"> <a
                        href="#">Friends</a> </div> </div> <!-- /.row -- </li>-->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="{{ route('profile') }}" class="btn btn-default btn-flat">Profile</a>
                            <a
                                class="btn btn-default btn-flat float-right"
                                href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">

                                <form
                                    id="logout-form"
                                    action="{{ route('logout') }}"
                                    method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                                <i class="ni ni-user-run"></i>
                                <span>Logout</span>
                            </a>
                            {{-- <a href="#" class="btn btn-default btn-flat float-right">Sign out</a> --}}
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
