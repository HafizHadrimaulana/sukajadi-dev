@php
$links = [
    [
        "href" => route('home'),
        "text" => "DASHBOARD",
        "icon" => "fas fa-home",
        "is_multi" => false
    ],
    [
      "href" => route('dataKegiatan'),
      "text" => "KEGIATAN",
      "icon" => "fas fa-camera",
      "is_multi" => false
    ],
    [
        "text" => "LAPORAN",
        "icon" => "fa fa-list-alt",
        "is_multi" => true,
        "href" => [
            [
                "section_text" => "Input",
                "section_icon" => "fas fa-edit",
                "section_href" => route('inputLaporan')
            ],
            [
                "section_text" => "Permasalahan",
                "section_icon" => "fas fa-edit",
                "section_href" => route('permasalahan')
            ]
        ]
    ],
    [
        "text" => "KELOLA AKUN",
        "icon" => "fas fa-users",
        "is_multi" => true,
        "href" => [
            [
                "section_text" => "Data Akun",
                "section_icon" => "far fa-circle",
                "section_href" => route('akun.index')
            ],
            [
                "section_text" => "Tambah Akun",
                "section_icon" => "far fa-circle",
                "section_href" => route('akun.add')
            ]
        ]
    ]
];
$navigation_links = json_decode(json_encode($links));
@endphp
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-dark elevation-4 sidebar-mini-xs">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
    <span ><center><b class="logo-mini">P</b>.</center></span>
      <span class="brand-text font-weight-light"><b></b></span>
 
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- SidebarSearch Form -->
      <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        @foreach ($navigation_links as $link)

            @if (!$link->is_multi)
            <li class="nav-item">
            <a href="{{ (url()->current() == $link->href) ? '#' : $link->href }}" class="nav-link {{ (url()->current() == $link->href) ? 'active' : '' }}">
              <i class="nav-icon {{ $link->icon }}"></i>
              <p>
                {{ $link->text }}
                {{-- <span class="right badge badge-danger">New</span> --}}
              </p>
            </a>
            </li>
            @else
            @php
                foreach($link->href as $section){
                    if (url()->current() == $section->section_href) {
                        $open = 'menu-open';
                        $status = 'active';
                        break; // Put this here
                    } else {
                        $open ='';
                        $status = '';
                    }
                }
            @endphp
            <li class="nav-item {{$open}}">
            <a href="#" class="nav-link {{$status}}">
                <i class="nav-icon {{ $link->icon }}"></i>
                <p>
                  {{ $link->text }}
                  <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @foreach ($link->href as $section)
                <li class="nav-item">
                  <a href="{{ (url()->current() == $section->section_href) ? '#' : $section->section_href }}" class="nav-link {{ (url()->current() == $section->section_href) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>{{ $section->section_text }}</p>
                  </a>
                </li>
                @endforeach
              </ul>
            </li>
            @endif

        @endforeach
        </ul>
    </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
