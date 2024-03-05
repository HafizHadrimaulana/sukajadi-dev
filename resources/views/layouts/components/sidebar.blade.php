@php

$links = [
    [
        "href" => route('admin.dashboard'),
        "text" => "DASHBOARD",
        "icon" => "fas fa-home",
        "is_multi" => false
    ],
    [
      "href" => route('admin.timeline.index'),
      "text" => "KEGIATAN",
      "icon" => "fas fa-camera",
      "is_multi" => false
    ],
    [
      "href" => route('admin.livechat.index'),
      "text" => "LIVECHAT",
      "icon" => "fas fa-comments",
        "roles" => ['superadmin', 'admin'],
      "is_multi" => false
    ],
    [
        "text" => "LAPORAN",
        "icon" => "fa fa-list-alt",
        "is_multi" => true,
        "href" => [
            [
                "section_text" => "Kegiatan",
                "section_icon" => "fas fa-edit",
                "section_href" => route('admin.kegiatan.index')
            ],
        ]
    ],
    [
        "text" => "AGENDA",
        "icon" => "fa fa-thumbtack",
        "is_multi" => true,
        "roles" => ['superadmin', 'admin', 'kecamatan'],
        "href" => [
            [
                "section_text" => "Surat Masuk",
                "section_icon" => "fa fa-envelope",
                "section_href" => route('admin.agenda.surat-masuk.index')
            ],
            [
                "section_text" => "Surat Keluar",
                "section_icon" => "fa fa-envelope",
                "section_href" => route('admin.agenda.surat-keluar.index')
            ],
            [
                "section_text" => "Surat Keputusan",
                "section_icon" => "fa fa-envelope",
                "section_href" => route('admin.agenda.surat-keputusan.index')
            ],
        ]
    ], 
    [
      "href" => route('admin.permohonan.index'),
      "text" => "PERMOHONAN SURAT",
      "icon" => "fas fa-envelope",
        "roles" => ['superadmin', 'admin'],
      "is_multi" => false
    ],
    [
        "text" => "DATA",
        "icon" => "fa fa-database",
        "is_multi" => true,
        "href" => [
            [
                "section_text" => "Warga",
                "section_icon" => "far fa-circle",
                "section_href" => route('admin.warga.index')
            ],
            [
                "section_text" => "Mitra",
                "section_icon" => "far fa-circle",
                "section_href" => route('admin.mitra.index')
            ],
            [
                "section_text" => "Media Sosial",
                "section_icon" => "far fa-circle",
                "section_href" => route('admin.medsos.index')
            ],
            [
                "section_text" => "Pegawai",
                "section_icon" => "far fa-circle",
                "section_href" => route('admin.pegawai.index')
            ],
            [
                "section_text" => "Penghargaan",
                "section_icon" => "far fa-circle",
                "section_href" => route('admin.penghargaan.index')
            ],
            [
                "section_text" => "Sarana dan Prasarana",
                "section_icon" => "far fa-circle",
                "section_href" => route('admin.sarpras.index')
            ],
            [
                "section_text" => "Usaha",
                "section_icon" => "far fa-circle",
                "section_href" => route('admin.usaha.index')
            ],
            [
                "section_text" => "Unggulan",
                "section_icon" => "far fa-circle",
                "section_href" => route('admin.unggulan.index')
            ],
            [
                "section_text" => "PKL",
                "section_icon" => "far fa-circle",
                "section_href" => route('admin.pkl.index')
            ]
        ]
    ],
    [
        "text" => "DATA KDA",
        "icon" => "fa fa-list-alt",
        "is_multi" => true,
        "href" => [
            [
                "section_text" => "Pegawai",
                "section_icon" => "fas fa-circle",
                "section_href" => route('admin.kda.pegawai.index')
            ],
            [
                "section_text" => "Sarana & Prasarana",
                "section_icon" => "fas fa-circle",
                "section_href" => route('admin.kda.sarpras.index')
            ],
            [
                "section_text" => "Usaha",
                "section_icon" => "fas fa-circle",
                "section_href" => route('admin.kda.usaha.index')
            ],
            [
                "section_text" => "Pengajuan",
                "section_icon" => "fas fa-circle",
                "section_href" => route('admin.kda.pengajuan.index')
            ],
        ]
    ],
    [
        "text" => "PENGATURAN",
        "icon" => "fa fa-cogs",
        "is_multi" => true,
        "roles" => ['superadmin', 'admin'],
        "href" => [
            [
                "section_text" => "Tahun",
                "section_icon" => "far fa-circle",
                "section_href" => route('admin.tahun.index')
            ],
            [
                "section_text" => "Bulan",
                "section_icon" => "far fa-circle",
                "section_href" => route('admin.bulan.index')
            ],
            [
                "section_text" => "Tahun Anggaran",
                "section_icon" => "far fa-circle",
                "section_href" => route('admin.anggaran.index')
            ]
        ]
    ],
    [
        "text" => "KELOLA AKUN",
        "icon" => "fas fa-users",
        "is_multi" => true,
        "roles" => ['superadmin', 'admin'],
        "href" => [
            [
                "section_text" => "Data Akun",
                "section_icon" => "far fa-circle",
                "roles" => ['superadmin', 'admin'],
                "section_href" => route('admin.akun.index')
            ],
            [
                "section_text" => "Tambah Akun",
                "section_icon" => "far fa-circle",
                "roles" => ['superadmin', 'admin'],
                "section_href" => route('admin.akun.create')
            ]
        ]
    ]
];
$navigation_links = json_decode(json_encode($links));
@endphp
  <!-- Main Sidebar Container -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <div class="brand-link">
    <center>
        <span class="logo-xs"><b>P</b>.</span>
    </center> 
    <center>       
        <span class="brand-text"><b>PORTAL</b></span>
    </center>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">MENU</li>
                @foreach ($navigation_links as $link)
    @php
        $shouldShow = true;
        $user = Auth::user();
        if ($user) {
            $user_role = $user->roles->pluck('name')->toArray();
        } else {
            $user_role = null;
        }
        if (isset($link->roles)) {
            $shouldShow = count(array_intersect($user_role, $link->roles)) > 0;
        }
        // if ($link->text === 'KELOLA AKUN' || $link->text === 'PENGATURAN') {
        //     $allowed_roles = ['superadmin', 'kecamatan'];
        //     $shouldShow = count(array_intersect($user_role, $allowed_roles)) > 0;
        // }
    @endphp
    @if ($shouldShow)
        @if (!$link->is_multi)
            <li class="nav-item">
                <a href="{{ (url()->current() == $link->href) ? '#' : $link->href }}" class="nav-link {{ (url()->current() == $link->href) ? 'active' : '' }}">
                    <i class="nav-icon {{ $link->icon }}"></i>
                    <p>{{ $link->text }}</p>
                </a>
            </li>
        @else
            @php
                $open = '';
                $status = '';
                foreach($link->href as $section) {
                    if (url()->current() == $section->section_href) {
                        $open = 'menu-open';
                        $status = 'active';
                        break;
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
                        @php
                            $shouldShowSection = true;
                            if (isset($section->roles)) {
                                $shouldShowSection = count(array_intersect($user_role, $section->roles)) > 0;
                            }
                        @endphp
                        @if ($shouldShowSection)
                            @if ($section->section_text === 'Kelola Akun' || $section->section_text === 'PENGATURAN')
                                @php
                                    $allowed_roles = ['superadmin', 'kecamatan'];
                                    $shouldShowSection = count(array_intersect($user_role, $allowed_roles)) > 0;
                                @endphp
                            @endif
                            <li class="nav-item">
                                <a href="{{ (url()->current() == $section->section_href) ? '#' : $section->section_href }}" class="nav-link {{ (url()->current() == $section->section_href) ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ $section->section_text }}</p>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>
        @endif
    @endif
@endforeach
                {{-- <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : null }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            DASHBOARD
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.timeline.index') }}" class="nav-link {{ Request::is('admin/timeline', 'admin/timeline/*') ? 'active' : null }}">
                        <i class="nav-icon fas fa-camera"></i>
                        <p>
                            KEGIATAN
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.livechat.index') }}" class="nav-link {{ Request::is('admin/livechat', 'admin/livechat/*') ? 'active' : null }}">
                        <i class="nav-icon fas fa-comment"></i>
                        <p>
                            LIVECHAT
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/kegiatan', 'admin/kegiatan/*') ? 'menu-open' : null }}">
                    <a href="#" class="nav-link {{ Request::is('admin/kegiatan', 'admin/kegiatan/*') ? 'active' : null }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            LAPORAN
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.kegiatan.index') }}" class="nav-link {{ Request::is('admin/kegiatan', 'admin/kegiatan/*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>KEGIATAN</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('admin/agenda', 'admin/agenda/*') ? 'menu-open' : null }}">
                    <a href="#" class="nav-link {{ Request::is('admin/agenda', 'admin/agenda/*') ? 'active' : null }}">
                        <i class="nav-icon fas fa-thumbtack"></i>
                        <p>
                            AGENDA
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.agenda.surat-masuk.index') }}" class="nav-link {{ Request::is('admin/agenda/surat-masuk', 'admin/agenda/surat-masuk/*') ? 'active' : null }}">
                                <i class="fa fa-envelope nav-icon"></i>
                                <p>SURAT MASUK</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.agenda.surat-keluar.index') }}" class="nav-link {{ Request::is('admin/agenda/surat-keluar', 'admin/agenda/surat-keluar/*') ? 'active' : null }}">
                                <i class="fa fa-envelope nav-icon"></i>
                                <p>SURAT KELUAR</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.agenda.surat-keputusan.index') }}" class="nav-link {{ Request::is('admin/agenda/surat-keputusan', 'admin/agenda/surat-keputusan/*') ? 'active' : null }}">
                                <i class="fa fa-envelope nav-icon"></i>
                                <p>SURAT KEPUTUSAN</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.permohonan.index') }}" class="nav-link {{ Request::is('admin/timeline', 'admin/timeline/*') ? 'active' : null }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            PERMOHONAN SURAT
                        </p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('admin/data/*', 'admin/medsos/*') ? 'menu-open' : null }}">
                    <a href="#" class="nav-link {{ Request::is('admin/data/*', 'admin/medsos/*') ? 'active' : null }}">
                        <i class="nav-icon fa fa-database"></i>
                        <p>
                            DATA
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.mitra.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mitra</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.medsos.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Media Sosial</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pegawai.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pegawai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.penghargaan.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penghargaan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.sarpras.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sarana & Prasarana</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.usaha.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Usaha</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.unggulan.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Unggulan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pkl.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PKL</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('admin/kda', 'admin/kda/*') ? 'menu-open' : null }}">
                    <a href="#" class="nav-link {{ Request::is('admin/kda', 'admin/kda/*') ? 'active' : null }}">
                        <i class="nav-icon fa fa-list-alt"></i>
                        <p>
                            KDA
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.kda.pegawai.index') }}" class="nav-link {{ Request::is('admin/kda/pegawai', 'admin/kda/pegawai/*') ? 'active' : null }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Pegawai</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.kda.sarpras.index') }}" class="nav-link {{ Request::is('admin/kda/sarpras', 'admin/kda/sarpras/*') ? 'active' : null }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Sarana & Prasarana</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.kda.usaha.index') }}" class="nav-link {{ Request::is('admin/kda/usaha', 'admin/kda/sarpras/*') ? 'active' : null }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Usaha</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.kda.pengajuan.index') }}" class="nav-link {{ Request::is('admin/kda/pengajuan', 'admin/kda/pengajuan/*') ? 'active' : null }}">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Pengajuan Data</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('admin/kegiatan', 'admin/kegiatan/*') ? 'menu-open' : null }}">
                    <a href="#" class="nav-link {{ Request::is('admin/kegiatan', 'admin/kegiatan/*') ? 'active' : null }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            PENGATURAN
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.tahun.index') }}" class="nav-link {{ Request::is('admin/kegiatan', 'admin/kegiatan/*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>TAHUN</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.bulan.index') }}" class="nav-link {{ Request::is('admin/kegiatan', 'admin/kegiatan/*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>BULAN</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.anggaran.index') }}" class="nav-link {{ Request::is('admin/kegiatan', 'admin/kegiatan/*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>TAHUN ANGGARAN</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item {{ Request::is('admin/kegiatan', 'admin/kegiatan/*') ? 'menu-open' : null }}">
                    <a href="#" class="nav-link {{ Request::is('admin/kegiatan', 'admin/kegiatan/*') ? 'active' : null }}">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            AKUN
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.tahun.index') }}" class="nav-link {{ Request::is('admin/kegiatan', 'admin/kegiatan/*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>DATA AKUN</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.bulan.index') }}" class="nav-link {{ Request::is('admin/kegiatan', 'admin/kegiatan/*') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>BUAT AKUN</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </nav>
    </div>
</aside>
