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
<div class="container-fluid">
      <div class="row">
          <div class="col-lg-3 col-6">
              <div class="rounded small-box bg-info">
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

        <div class="col-lg-3 col-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"><b>Agenda Hari ini (0)</b></h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-bs-toggle="collapse" data-bs-target="#agenda"><i class="fas fa-minus"></i>
                </button> 
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body" id="agenda" style="overflow-y:auto;height:29vh">
              <ul class="list-group list-group-flush">
                <!-- List items here -->
              </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer text-center">
              <a href="https://sukajadi.bandung.go.id/portal/admin/agenda/agenda_kalender" class="stretched-link">Lihat semua Agenda <i class="fas fa-arrow-circle-right"></i></a>
            </div>
            <!-- /.card-footer -->
          </div>
        </div>
        
        <!-- ... Other columns here ... -->
        <div class="col-lg-6 col-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><b>Grafik Agenda &amp; Surat</b></h3>
                <div class="card-tools ms-auto">
                  <select id="tahun_grafik_surat" onchange="pilihan_tahun_grafik_surat()" class="form-select form-select-sm">
                    <option value="4">2023</option>
                    <option value="3">2022</option>
                    <option value="2">2021</option>
                    <option value="1">2020</option>
                  </select>
                  <button type="button" class="btn btn-tool" data-bs-toggle="collapse" data-bs-target="#chartCollapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body collapse show" id="chartCollapse">
                <div class="chart">
                  <canvas id="myChart_surat"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          
          <script>
          document.addEventListener('DOMContentLoaded', function() {
            pilih_tahun_grafik_surat();
          });
          
          function pilihan_tahun_grafik_surat() {
            var tahun_grafik_surat = document.getElementById('tahun_grafik_surat').value;
            pilih_tahun_grafik_surat(tahun_grafik_surat);
          }
          
          function pilih_tahun_grafik_surat(tahun_grafik_surat) {
            var url = tahun_grafik_surat ?
              `https://sukajadi.bandung.go.id/portal/admin/dashboard/ajax_grafik_surat/${tahun_grafik_surat}` :
              'https://sukajadi.bandung.go.id/portal/admin/dashboard/ajax_grafik_surat/';
          
            fetch(url)
              .then(response => response.json())
              .then(data => {
                var labels = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                var value_jumlah_agenda = data.map(item => item.jumlah_agenda);
                var value_jumlah_surat_masuk = data.map(item => item.jumlah_surat_masuk);
                var value_jumlah_surat_keluar = data.map(item => item.jumlah_surat_keluar);
          
                var ctx = document.getElementById('myChart_surat').getContext('2d');
                var chart = new Chart(ctx, {
                  type: 'bar',
                  data: {
                    labels: labels,
                    datasets: [
                      { label: 'Agenda', stack: 'stack', backgroundColor: "#52d9ce", data: value_jumlah_agenda },
                      { label: 'Masuk', stack: 'stack', backgroundColor: "#98e78f", data: value_jumlah_surat_masuk },
                      { label: 'Keluar', stack: 'stack', backgroundColor: "#f6cf58", data: value_jumlah_surat_keluar }
                    ]
                  },
                  options: {
                    scales: {
                      y: {
                        beginAtZero: true,
                        grid: {
                          display: false
                        }
                      },
                      x: {
                        grid: {
                          display: false
                        }
                      }
                    },
                    plugins: {
                      legend: {
                        labels: {
                          usePointStyle: true,
                          boxWidth: 6
                        }
                      }
                    }
                  }
                });
              });
          }
          </script>
              <div class="col-lg-3 col-6">
                <div class="card">
                  <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title mb-0"><b>Pie Surat</b></h3>
                    <div class="card-tools">
                      <select id="tahun_pie_surat" class="form-select form-select-sm" onchange="pilihan_tahun_pie_surat()">
                        <option value="4">2023</option>
                        <option value="3">2022</option>
                        <option value="2">2021</option>
                        <option value="1">2020</option>
                      </select>
                      <button type="button" class="btn btn-sm" data-bs-toggle="collapse" data-bs-target="#collapseExample">
                        <i class="bi bi-dash"></i>
                      </button> 
                    </div>
                  </div>
                  <div class="collapse show" id="collapseExample">
                    <div class="card-body">
                      <!-- Chart's container -->
                      <canvas id="myChart_surat_pie" class="chartjs-render-monitor"></canvas>
                    </div>
                  </div>
                </div>
              </div>
          
        
      
  </div>
</section>
@endsection