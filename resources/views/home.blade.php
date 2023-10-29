@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Halaman Dashboard')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dashboard
          <small>Grafik</small>
          </h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
  <div class="container">
      <div class="row">
          <div class="col-lg-3 col-6">
              <div class="small-box bg-info">
                  <div class="inner">
                    <script type="text/javascript">
                      window.setTimeout("waktu()", 1000);
                      function waktu() {
                        var waktu = new Date();
                        setTimeout("waktu()", 1000);
                        document.getElementById("jam").innerHTML = checkTime(waktu.getHours()) + ":" + checkTime(waktu.getMinutes()) + ":" + checkTime(waktu.getSeconds());
                        var namahari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
                        var namabulan = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nov", "Des"];
                        var tgl = new Date();
                        var hari = tgl.getDay();
                        var tanggal = tgl.getDate();
                        var bulan = tgl.getMonth();
                        var bulan3 = tgl.getMonth() + 1;
                        var tahun = tgl.getFullYear().toString().substr(2, 2);
                        document.getElementById("tanggal2").innerHTML = tanggal + " " + namabulan[bulan] + " " + tahun;
                        document.getElementById("tanggal3").innerHTML = tanggal + " / " + bulan3;
                        document.getElementById("hari2").innerHTML = namahari[hari];
                      }
                      function checkTime(i) {
                        if (i < 10) {
                          i = "0" + i;
                        }
                        return i;
                      }
                    </script>
                      <div id="clock"></div>
                      <h3 class="d-none d-md-block"><span id="tanggal2"></span></h3>
                      <h3 class="d-md-none"><span id="tanggal3"></span></h3>
                      <p><span id="jam"></span> - <span id="hari2"></span></p>
                  </div>
                  <div class="icon">
                      <i class="far fa-calendar"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                      <i class="fas fa-arrow-circle-right"></i>
                  </a>
              </div>
          </div>

          <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                  <div class="inner">
                      <h3>0</h3>
                      <p><b>0</b> Permohonan + <b>0</b> Pengambilan</p>
                  </div>
                  <div class="icon">
                      <i class="far fa-credit-card"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                      <i class="fas fa-arrow-circle-right"></i>
                  </a>
              </div>
          </div>

          <div class="col-lg-3 col-6">
              <div class="small-box bg-purple">
                  <div class="inner">
                      <h3>27,103</h3>
                      <p>Rekap Vaksinasi</p>
                  </div>
                  <div class="icon">
                      <i class="fas fa-syringe"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                      <i class="fas fa-arrow-circle-right"></i>
                  </a>
              </div>
          </div>

          <div class="col-lg-3 col-6">
              <div class="small-box bg-orange">
                  <div class="inner">
                      <h3>78</h3>
                      <p>Posyandu</p>
                  </div>
                  <div class="icon">
                      <i class="fas fa-hospital"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                      <i class="fas fa-arrow-circle-right"></i>
                  </a>
              </div>
          </div>
      </div>

      <div class="row">
          <div class="col-lg-3 col-6">
              <div class="small-box bg-primary">
                  <div class="inner">
                      <h3>Prestasi</h3>
                      <p>Tahun ini</p>
                  </div>
                  <div class="icon">
                      <i class="fas fa-star"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                      <i class="fas fa-arrow-circle-right"></i>
                  </a>
              </div>
          </div>

          <div class="col-lg-3 col-6">
              <div class="small-box bg-gray">
                  <div class="inner">
                      <h3>4,878</h3>
                      <p>Data Sarana Prasarana</p>
                  </div>
                  <div class="icon">
                      <i class="fas fa-database"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                      <i class="fas fa-arrow-circle-right"></i>
                  </a>
              </div>
          </div>

          <div class="col-lg-3 col-6">
              <div class="small-box bg-pink">
                  <div class="inner">
                      <h3>1,192</h3>
                      <p>DUTABULIN</p>
                  </div>
                  <div class="icon">
                      <i class="fas fa-child"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                      <i class="fas fa-arrow-circle-right"></i>
                  </a>
              </div>
          </div>

          <div class="col-lg-3 col-6">
              <div class="small-box bg-danger">
                  <div class="inner">
                      <h3>816</h3>
                      <p>Rembug Warga</p>
                  </div>
                  <div class="icon">
                      <i class="fas fa-comments"></i>
                  </div>
                  <a href="#" class="small-box-footer">
                      <i class="fas fa-arrow-circle-right"></i>
                  </a>
              </div>
          </div>
      </div>
  </div>

  <div class="row">
      <section class="col-lg-5 connectedSortable ui-sortable">
          <div class="card bg-gradient-secondary">
              <div class="card-header border-0 ui-sortable-handle" style="cursor: move;">
                  <h3 class="card-title">
                      <i class="fas fa-map-marker-alt mr-1"></i>
                      GIS Sukajadi Bandung
                  </h3>
                  <div class="card-tools">
                      <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                          <i class="far fa-calendar-alt"></i>
                      </button>
                      <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                  </div>
              </div>
              <div class="card-body">
                  <iframe width='100%' height='640px' src='https://www.arcgis.com/apps/View/index.html?appid=aff8a31acc4342c191004bc9c4eb84cb&extent=107.5702,-6.8908,107.6105,-6.8706' frameborder='0' scrolling='no'></iframe>
              </div>
          </div>
      </section>
  </div>
</section>
@endsection