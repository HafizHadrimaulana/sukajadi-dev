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
            <a class="nav-link" href="#" id="notificationsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="far fa-bell"></i>
                <span class="badge badge-warning">

                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right dropdown-menu-notif" aria-labelledby="notificationsDropdown">
                <span class="dropdown-item dropdown-header" id="notif-total"> 
                    
                </span>
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.agenda.surat-masuk.index', ['tahun' => '2024']) }}" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i>Surat Masuk
                    <span class="float-right text-muted text-sm" id="notif-suratMasuk">

                    </span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.agenda.surat-masuk.index', ['tahun' => '2024']) }}"  class="dropdown-item">
                    <i class="fas fa-users mr-2"></i>Surat Keluar
                    <span class="float-right text-muted text-sm"  id="notif-suratKeluar">

                    </span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.kda.pengajuan.index', ['tahun' => '2024']) }}"  class="dropdown-item">
                    <i class="fas fa-users mr-2"></i>Pengajuan Data
                    <span class="float-right text-muted text-sm"  id="notif-pengajuan">

                    </span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('admin.livechat.index') }}"  class="dropdown-item">
                    <i class="fas fa-comments mr-2"></i>Live Chat
                    <span class="float-right text-muted text-sm" id="notif-chat">

                    </span>
                </a>
            </div>
        </li>

        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                @if (Auth::user()->user_image)
                <img src="{{ Auth::user()->user_image }}" class="user-image img-circle elevation-2" alt="User Imagess">
                @else
                <img src="{{ asset('vendor/adminlte3/img/user2.png') }}" class="user-image img-circle elevation-2"
                    alt="User Imagess">
                @endif
                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right elevation-4">
                <!-- User image -->
                <li class="user-header bg-white">
                    @if (Auth::user()->user_image)
                    <img src="{{ Auth::user()->user_image }}" class="img-circle elevation-2" alt="User Imagess">
                    @else
                    <img src="{{ asset('vendor/adminlte3/img/user2.png') }}" class="img-circle elevation-2"
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
                <li class="user-footer bg-dark ">
                    <a href="{{ route('profile') }}"
                        class="btn btn-default btn-flat bg-secondary float-left">Profile</a>
                    <a class="btn btn-default btn-flat bg-red float-right" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <i class="fas fa-power-off"></i>
                        <span>Logout</span>
                    </a>
                    {{-- <a href="#" class="btn btn-default btn-flat float-right">Sign out</a> --}}
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
