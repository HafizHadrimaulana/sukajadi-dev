@php
$links = [
    [
        "text" => "MENU",
        "icon" => false,
        "href" => "#",
        "is_multi" => false
    ],
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
        "text" => "AGENDA",
        "icon" => "fa fa-thumbtack",
        "is_multi" => true,
        "href" => [
            [
                "section_text" => "Kalender",
                "section_icon" => "fa fa-calendar",
                "section_href" => route('kalender')
            ],
            [
                "section_text" => "Surat Masuk",
                "section_icon" => "fa fa-envelope",
                "section_href" => route('suratMasuk')
            ],
            [
                "section_text" => "Surat Keluar",
                "section_icon" => "fa fa-envelope",
                "section_href" => route('suratKeluar')
            ],
            [
                "section_text" => "Surat Keputusan",
                "section_icon" => "fa fa-envelope",
                "section_href" => route('suratKeputusan')
            ],
            [
                "section_text" => "Laporan Agenda",
                "section_icon" => "fa fa-calendar",
                "section_href" => route('cetak-laporan-agenda')
            ],
            [
                "section_text" => "Laporan Surat Masuk",
                "section_icon" => "fa fa-pdf",
                "section_href" => route('cetak-laporan-surat-masuk')
            ],
            [
                "section_text" => "Laporan Surat Keluar",
                "section_icon" => "fa fa-pdf",
                "section_href" => route('cetak-laporan-surat-keluar')
            ],
            [
                "section_text" => "Laporan Surat Keputusan",
                "section_icon" => "fa fa-pdf",
                "section_href" => route('cetak-laporan-surat-keputusan')
            ],
            
        ]
    ], 
    [
        "text" => "DATA",
        "icon" => "fa fa-database",
        "is_multi" => true,
        "href" => [
            [
                "section_text" => "Mitra",
                "section_icon" => "far fa-circle",
                "section_href" => route('mitra')
            ],
            [
                "section_text" => "Media Sosial",
                "section_icon" => "far fa-circle",
                "section_href" => route('mediaSosial')
            ],
            [
                "section_text" => "Pegawai",
                "section_icon" => "far fa-circle",
                "section_href" => route('pegawai')
            ],
            [
                "section_text" => "Penghargaan",
                "section_icon" => "far fa-circle",
                "section_href" => route('penghargaan')
            ],
            [
                "section_text" => "Sarana dan Prasarana",
                "section_icon" => "far fa-circle",
                "section_href" => route('saranaDanprasarana')
            ],
            [
                "section_text" => "Usaha",
                "section_icon" => "far fa-circle",
                "section_href" => route('usaha')
            ],
            [
                "section_text" => "Unggulan",
                "section_icon" => "far fa-circle",
                "section_href" => route('unggulan')
            ],
            [
                "section_text" => "PKL",
                "section_icon" => "far fa-circle",
                "section_href" => route('pkl')
            ]

        ]
    ],
    [
        "text" => "LAYANAN",
        "icon" => "fas fa-street-view",
        "is_multi" => true,
        "href" => [
            [
                "section_text" => "PKB",
                "section_icon" => "far fa-circle",
                "section_href" => route('pkb')
            ],
            [
                "section_text" => "PBB",
                "section_icon" => "far fa-circle",
                "section_href" => route('pbb')
            ],
            [
                "section_text" => "Data Warga",
                "section_icon" => "far fa-circle",
                "section_href" => route('dataWarga')
            ]
        ]
    ],
    [
        "text" => "ASPIRASI",
        "icon" => "fa fa-hashtag",
        "is_multi" => true,
        "href" => [
            [
                "section_text" => "Rembug Warga",
                "section_icon" => "far fa-circle",
                "section_href" => route('rembugWargaadmin')
            ],
            [
                "section_text" => "Matrix PIPPK",
                "section_icon" => "far fa-circle",
                "section_href" => route('matrixPippk')
            ]
        ]
    ],
    [
        "text" => "DOKUMEN",
        "icon" => "fa fa-cloud",
        "is_multi" => true,
        "href" => [
            [
                "section_text" => "File",
                "section_icon" => "far fa-circle",
                "section_href" => route('file')
            ],
            [
                "section_text" => "Link",
                "section_icon" => "far fa-circle",
                "section_href" => route('link')
            ]
        ]
    ],
    [
        "text" => "PENGATURAN",
        "icon" => false,
        "href" => "#",
        "is_multi" => false
    ],
    [
      "href" => route('pemberitahuan'),
      "text" => "PEMBERITAHUAN",
      "icon" => "fa fa-bell",
      "is_multi" => false
    ],
    [
        "text" => "PENGATURAN",
        "icon" => "fa fa-cogs",
        "is_multi" => true,
        "href" => [
            [
                "section_text" => "Tahun",
                "section_icon" => "far fa-circle",
                "section_href" => route('tahun')
            ],
            [
                "section_text" => "Bulan",
                "section_icon" => "far fa-circle",
                "section_href" => route('bulan')
            ],
            [
                "section_text" => "Tahun Anggaran",
                "section_icon" => "far fa-circle",
                "section_href" => route('tahunAnggaran')
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
  <aside class="main-sidebar sidebar-dark-secondary sidebar-mini">
    <!-- Brand Logo -->
    <a href="/home" class="brand-link">
      <center><span class="logo-mini"><b>P</b><span class="brand-text font-weight-light"><b>ORTAL</b></span></span></center>
      
 
    </a>

    <!-- Sidebar -->
    <div class="sidebar">



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
