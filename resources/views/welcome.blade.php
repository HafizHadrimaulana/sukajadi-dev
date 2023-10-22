<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="ThemeMarch">
  <!-- Favicon Icon -->
  <link rel="icon" href="assets/img/favicon.png">
  <!-- Site Title -->
  <title>{{ config('app.name') }}</title>
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
  <div class="cs-preloader cs-white_bg cs-center">
    <div class="cs-preloader_in">
      <img src="assets/img/sukajadi-logo.svg" alt="Logo">
    </div>
  </div>
  <!-- Start Header Section -->
  <header class="cs-site_header cs-style1 cs-sticky-header cs-primary_color cs-white_bg">
    <div class="cs-main_header">
        <div class="container">
            <div class="cs-main_header_in">
                <div class="cs-main_header_left">
                    <a class="cs-site_branding cs-accent_color" href="welcome.blade.php">
                    <a href="#home" class="navbar-brand">
                       <span class="custom-text"><b>PORTAL</b>| Kecamatan</span>
                    </a>
                    </a>
                </div>
                <div class="cs-main_header_center">
                    <div class="cs-nav">
                        <ul class="cs-nav_list">
                            <li><a href="#home class="cs-smoth_scroll">Beranda</a></li>
                            <li><a href="{{ route('kegiatan') }}" class="cs-smoth_scroll">Kegiatan</a></li>
                            <li><a href="#data" class="cs-smoth_scroll">Data</a></li>
                            <li><a href="{{ route('vaksinasi') }}" class="cs-smoth_scroll">Vaksinasi</a></li>
                            <li><a href="{{ route('posyandu') }}" class="cs-smoth_scroll">Posyandu</a></li>
                            <li><a href="{{ route('rembug-warga') }}" class="cs-smoth_scroll">Rembug Warga</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Masukkan kode yang baru Anda berikan di sini -->
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                   @if (!Auth::check())
                   <a href="{{ route('login') }}" class="login-button text-sm login-text">
                    <span class="arrow"><b>➔</b></span><b>Login</b>
                  </a>
                  @endif
                   </div>
                <!-- Akhir kode yang baru Anda berikan -->
            </div>
        </div>
    </div>
</header>

  <!-- End Header Section -->

  <!-- Start Hero -->
  <div id="home">

    <div class="cs-height_80 cs-height_lg_80"></div>
  <center>
<img src="https://sukajadi.bandung.go.id/portal/upload/logo.png" style="height: 8rem;" data-pagespeed-url-hash="858298967" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
<img src="https://sukajadi.bandung.go.id/portal/upload/logo2.png" style="height: 8rem;" data-pagespeed-url-hash="1797676001" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
</center>
<script>
        var botmanWidget = {
            aboutText:'Kecamatan Sukajadi',
            introMessage :'Testing',
        };

    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
<section class="cs-hero cs-style1 cs-bg" data-src="assets/img/wallpaper.svg">
      <div class="container">
        <div class="cs-hero_img">
          <div class="cs-hero_img_bg cs-bg" data-src="assets/img/hero_img_bg.png"></div>
          <img src="assets/img/hero_img.png" alt="Hero Image" class="wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.4s">
        </div>

        <div class="cs-hero_text">
          <div class="cs-hero_secondary_title">Selamat Datang
          </div>
          <h1 class="cs-hero_title">KECAMATAN SUKJADI<br>KOTA BANDUNG</h1>
          <div class="cs-hero_subtitle">Jl. Sukamulya No.4</div>
        </div>
        <div class="cs-hero_shapes">
          <div class="cs-shape cs-shape_position1">
            <img src="assets/img/shape/shape_1.svg" alt="Shape">
          </div>
          <div class="cs-shape cs-shape_position2">
            <img src="assets/img/shape/shape_2.svg" alt="Shape">
          </div>
          <div class="cs-shape cs-shape_position3">
            <img src="assets/img/shape/shape_3.svg" alt="Shape">
          </div>
          <div class="cs-shape cs-shape_position4">
            <img src="assets/img/shape/shape_4.svg" alt="Shape">
          </div>
          <div class="cs-shape cs-shape_position5">
            <img src="assets/img/shape/shape_5.svg" alt="Shape">
          </div>
          <div class="cs-shape cs-shape_position6">
            <img src="assets/img/shape/shape_6.svg" alt="Shape">
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- End Hero -->

  <!-- Start Main Feature -->
  <section class="cs-bg" data-src="assets/img/feature_bg.svg">
    <div class="cs-height_95 cs-height_lg_70"></div>
    <div class="container">
      <div class="cs-seciton_heading cs-style1 text-center">
        <div class="cs-section_subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">Kecamatan Sukajadi</div>
        <div class="cs-height_10 cs-height_lg_10"></div>
        <h3 class="cs-section_title">DATA & KEGIATAN</h3>
      </div>
      <div class="cs-height_50 cs-height_lg_40"></div>
      <div class="row">
        <div class="col-md-3">
  <div class="cs-height_25 cs-height_lg_0"></div>
  <div class="cs-iconbox cs-style1">
    <div class="cs-iconbox_icon cs-center">
      <img src="assets/img/icons/icon_box_1.svg" alt="Icon">
    </div>
    <div class="cs-iconbox_in">
        <h3 class="cs-iconbox_title" id="tanggalAktif"></h3>
        <div class="cs-iconbox_subtitle" id="tanggalWaktuAktif"></div>
    </div>

    <script>
        function updateTanggalWaktu() {
            const tanggalAktifElement = document.getElementById("tanggalAktif");
            const tanggalWaktuAktifElement = document.getElementById("tanggalWaktuAktif");
            const sekarang = new Date();

            const hari = sekarang.toLocaleDateString('id-ID', { weekday: 'long' });
            const tanggal = sekarang.toLocaleDateString();

            // Hapus tulisan "Waktu Aktif:" dan spasi sebelum waktu
            const waktu = sekarang.toLocaleTimeString().replace("Waktu Aktif: ", "");

            tanggalAktifElement.textContent = `${hari}, ${tanggal}`;
            tanggalWaktuAktifElement.textContent = waktu;
        }

        // Memanggil fungsi updateTanggalWaktu setiap detik
        setInterval(updateTanggalWaktu, 1000);

        // Memanggil fungsi untuk menampilkan tanggal dan waktu saat halaman pertama kali dimuat
        updateTanggalWaktu();
    </script>
  </div>
  <div class="cs-height_25 cs-height_lg_25"></div>
</div>
        <div class="col-md-3">
  <div class="cs-height_25 cs-height_lg_0"></div>
  <div class="cs-iconbox cs-style1">
    <div class="cs-iconbox_icon cs-center">
      <img src="assets/img/icons/icon_box_2.svg" alt="Icon">
    </div>
    <div class="cs-iconbox_in">
      <h3 class="cs-iconbox_title">Layanan</h3>
      <div class="cs-iconbox_subtitle">Kependudukan</div>
    </div>
  </div>
  <div class="cs-height_25 cs-height_lg_25"></div>
</div>
        <div class="col-md-3">
  <div class="cs-height_25 cs-height_lg_0"></div>
  <div class="cs-iconbox cs-style1">
    <div class="cs-iconbox_icon cs-center">
      <img src="assets/img/icons/icon_box_3.svg" alt="Icon">
    </div>
    <div class="cs-iconbox_in">
      <h3 class="cs-iconbox_title">27.013</h3>
      <div class="cs-iconbox_subtitle">Rekap Vaksinasi</div>
    </div>
  </div>
  <div class="cs-height_25 cs-height_lg_25"></div>
</div>
<div class="col-md-3">
  <div class="cs-height_25 cs-height_lg_0"></div>
  <div class="cs-iconbox cs-style1">
    <div class="cs-iconbox_icon cs-center">
      <img src="assets/img/icons/icon_box_4.svg" alt="Icon">
    </div>
    <div class="cs-iconbox_in">
      <h3 class="cs-iconbox_title">78</h3>
      <div class="cs-iconbox_subtitle">Posyandu</div>
    </div>
  </div>
  <div class="cs-height_25 cs-height_lg_25"></div>
</div>
<div class="col-md-3">
  <div class="cs-height_25 cs-height_lg_0"></div>
  <div class="cs-iconbox cs-style1">
    <div class="cs-iconbox_icon cs-center">
      <img src="assets/img/icons/icon_box_5.svg" alt="Icon">
    </div>
    <div class="cs-iconbox_in">
      <h3 class="cs-iconbox_title">Prestasi</h3>
      <div class="cs-iconbox_subtitle">Tahun Ini</div>
    </div>
  </div>
  <div class="cs-height_25 cs-height_lg_25"></div>
</div>
<div class="col-md-3">
  <div class="cs-height_25 cs-height_lg_0"></div>
  <div class="cs-iconbox cs-style1">
    <div class="cs-iconbox_icon cs-center">
      <img src="assets/img/icons/icon_box_6.svg" alt="Icon">
    </div>
    <div class="cs-iconbox_in">
      <h3 class="cs-iconbox_title">4.878</h3>
      <div class="cs-iconbox_subtitle">Data</div>
    </div>
  </div>
  <div class="cs-height_25 cs-height_lg_25"></div>
</div>
<div class="col-md-3">
  <div class="cs-height_25 cs-height_lg_0"></div>
  <div class="cs-iconbox cs-style1">
    <div class="cs-iconbox_icon cs-center">
      <img src="assets/img/icons/icon_box_7.svg" alt="Icon">
    </div>
    <div class="cs-iconbox_in">
      <h3 class="cs-iconbox_title">1.192</h3>
      <div class="cs-iconbox_subtitle">Dutabulin</div>
    </div>
  </div>
  <div class="cs-height_25 cs-height_lg_25"></div>
</div>
<div class="col-md-3">
  <div class="cs-height_25 cs-height_lg_0"></div>
  <div class="cs-iconbox cs-style1">
    <div class="cs-iconbox_icon cs-center">
      <img src="assets/img/icons/icon_box_8.svg" alt="Icon">
    </div>
    <div class="cs-iconbox_in">
      <h3 class="cs-iconbox_title">816</h3>
      <div class="cs-iconbox_subtitle">Rembug Warga</div>
    </div>
  </div>
  <div class="cs-height_25 cs-height_lg_25"></div>
</div>
    <div class="chart-container">
    <canvas id="myChart"></canvas>
    </div>
    <div class="col-md-6">
                    <!-- Tambahkan elemen untuk memilih tahun -->
                    <label for="selectYear">Pilih Tahun:</label>
                    <select id="selectYear">
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <!-- Tambahkan opsi tahun sesuai dengan kebutuhan Anda -->
                    </select>
                </div>
      </div>
      <div class="cs-height_75 cs-height_lg_45"></div>
    </div>
  </section>
  <!-- End Main Feature -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Skrip JavaScript untuk membuat grafik -->
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var selectYear = document.getElementById('selectYear');

    // Data grafik awal
    var data = {
        labels: ['2021', '2022', '2023'], // Tambahkan tahun ke dalam labels
        datasets: [{
            label: 'Contoh Grafik',
            data: [10, 20, 30],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)'
            ],
            borderWidth: 0.5
        }]
    };
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            responsive: true
        }
    });

    // Event listener untuk perubahan tahun
    selectYear.addEventListener('change', function () {
        var selectedYear = selectYear.value;
        drawChart(selectedYear); // Memanggil fungsi drawChart dengan tahun yang dipilih
    });

    // Fungsi untuk menggambar grafik
    function drawChart(year) {
        // Di sini Anda dapat mengatur data grafik dan label berdasarkan tahun yang dipilih
        // Misalnya, Anda dapat memuat data dari server atau sumber data eksternal lainnya
        // Kemudian, Anda dapat memperbarui properti 'data' dari objek myChart dengan data yang baru

        if (year === '2021') {
            data.labels = ['Jan 2021', 'Feb 2021', 'Mar 2021']; // Contoh label berdasarkan tahun
            data.datasets[0].data = [10, 20, 30]; // Contoh data berdasarkan tahun
        } else if (year === '2022') {
            data.labels = ['Jan 2022', 'Feb 2022', 'Mar 2022']; // Contoh label berdasarkan tahun
            data.datasets[0].data = [15, 25, 35]; // Contoh data berdasarkan tahun
        } else if (year === '2023') {
            data.labels = ['Jan 2023', 'Feb 2023', 'Mar 2023']; // Contoh label berdasarkan tahun
            data.datasets[0].data = [12, 22, 32]; // Contoh data berdasarkan tahun
        }

        // Membuat objek Chart baru atau memperbarui grafik yang ada
        if (myChart) {
            myChart.destroy(); // Hancurkan grafik yang ada jika ada
        }
        myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                responsive: true
            }
        });
    }
</script>
  <!-- Start About -->
  <section id="about" class="cs-gradient_bg_1">
    <div class="cs-height_100 cs-height_lg_70"></div>
    <div class="container">
      <div class="row align-items-center flex-column-reverse-lg">
        <div class="col-xl-6 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
          <div class="cs-left_full_width cs-space110">
            <div class="cs-left_sided_img">
              <img src="assets/img/about_img_1.png" alt="About">
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="cs-height_0 cs-height_lg_40"></div>
          <div class="cs-seciton_heading cs-style1">
            <div class="cs-section_subtitle">...</div>
            <div class="cs-height_10 cs-height_lg_10"></div>
            <h3 class="cs-section_title">....</h3>
          </div>
          <div class="cs-height_20 cs-height_lg_20"></div>
          <p>
            ...<br>
            ...<br>
            ...
          </p>
          <div class="cs-height_15 cs-height_lg_15"></div>
          <div class="cs-list_1_wrap">
            <ul class="cs-list cs-style1 cs-mp0">
              <li>
                <span class="cs-list_icon">
                  <img src="assets/img/icons/tick.svg" alt="Tick">
                </span>
                <div class="cs-list_right">
                  <h3>...</h3>
                  <p>...</p>
                </div>
              </li>
              <li>
                <span class="cs-list_icon">
                  <img src="assets/img/icons/tick.svg" alt="Tick">
                </span>
                <div class="cs-list_right">
                  <h3>...</h3>
                  <p>...</p>
                </div>
              </li>
            </ul>
            <div class="cs-list_img wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s"><img src="assets/img/about_img_2.png" alt="About"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="cs-height_100 cs-height_lg_70"></div>
    <div class="cs-height_135 cs-height_lg_0"></div>
  </section>
  <!-- End About -->

  <!-- Start Fun Fact -->
  <div class="container-fluid">
    <div class="cs-funfact_1_wrap cs-type1">
      <div class="cs-funfact cs-style1">
        <div class="cs-funfact_icon cs-center"><img src="assets/img/icons/funfact_icon_1.svg" alt="Icon"></div>
        <div class="cs-funfact_right">
          <div class="cs-funfact_number cs-primary_font"><span data-count-to="320" class="odometer"></span>+</div>
          <h2 class="cs-funfact_title">...</h2>
        </div>
      </div>
      <div class="cs-funfact cs-style1">
        <div class="cs-funfact_icon cs-center"><img src="assets/img/icons/funfact_icon_2.svg" alt="Icon"></div>
        <div class="cs-funfact_right">
          <div class="cs-funfact_number cs-primary_font"><span data-count-to="92" class="odometer"></span>k</div>
          <h2 class="cs-funfact_title">...</h2>
        </div>
      </div>
      <div class="cs-funfact cs-style1">
        <div class="cs-funfact_icon cs-center"><img src="assets/img/icons/funfact_icon_3.svg" alt="Icon"></div>
        <div class="cs-funfact_right">
          <div class="cs-funfact_number cs-primary_font"><span data-count-to="5" class="odometer"></span>k</div>
          <h2 class="cs-funfact_title">...</h2>
        </div>
      </div>
      <div class="cs-funfact cs-style1">
        <div class="cs-funfact_icon cs-center"><img src="assets/img/icons/funfact_icon_4.svg" alt="Icon"></div>
        <div class="cs-funfact_right">
          <div class="cs-funfact_number cs-primary_font"><span data-count-to="20" class="odometer"></span>+</div>
          <h2 class="cs-funfact_title">...</h2>
        </div>
      </div>
    </div>
  </div>
  <!-- End Fun Fact -->

  <!-- Start All Feature -->
  <section class="cs-bg" data-src="assets/img/feature_bg.svg">
    <div class="cs-height_135 cs-height_lg_0"></div>
    <div id="feature">
      <div class="cs-height_95 cs-height_lg_70"></div>
      <div class="container">
        <div class="cs-seciton_heading cs-style1 text-center">
          <div class="cs-section_subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">POS Features</div>
          <div class="cs-height_10 cs-height_lg_10"></div>
          <h3 class="cs-section_title">...</h3>
        </div>
        <div class="cs-height_50 cs-height_lg_40"></div>
        <div class="row">
          <div class="col-xl-4 col-md-6">
            <div class="cs-iconbox cs-style1 cs-type1">
              <div class="cs-iconbox_icon cs-center">
                <img src="assets/img/icons/icon_box_5.svg" alt="Icon">
              </div>
              <div class="cs-iconbox_in">
                <h3 class="cs-iconbox_title">...</h3>
                <div class="cs-iconbox_subtitle">...</div>
              </div>
            </div>
            <div class="cs-height_25 cs-height_lg_25"></div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="cs-iconbox cs-style1 cs-type1">
              <div class="cs-iconbox_icon cs-center">
                <img src="assets/img/icons/icon_box_6.svg" alt="Icon">
              </div>
              <div class="cs-iconbox_in">
                <h3 class="cs-iconbox_title">...</h3>
                <div class="cs-iconbox_subtitle">...</div>
              </div>
            </div>
            <div class="cs-height_25 cs-height_lg_25"></div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="cs-iconbox cs-style1 cs-type1">
              <div class="cs-iconbox_icon cs-center">
                <img src="assets/img/icons/icon_box_7.svg" alt="Icon">
              </div>
              <div class="cs-iconbox_in">
                <h3 class="cs-iconbox_title">...</h3>
                <div class="cs-iconbox_subtitle">...</div>
              </div>
            </div>
            <div class="cs-height_25 cs-height_lg_25"></div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="cs-iconbox cs-style1 cs-type1">
              <div class="cs-iconbox_icon cs-center">
                <img src="assets/img/icons/icon_box_8.svg" alt="Icon">
              </div>
              <div class="cs-iconbox_in">
                <h3 class="cs-iconbox_title">...</h3>
                <div class="cs-iconbox_subtitle">...</div>
              </div>
            </div>
            <div class="cs-height_25 cs-height_lg_25"></div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="cs-iconbox cs-style1 cs-type1">
              <div class="cs-iconbox_icon cs-center">
                <img src="assets/img/icons/icon_box_9.svg" alt="Icon">
              </div>
              <div class="cs-iconbox_in">
                <h3 class="cs-iconbox_title">...</h3>
                <div class="cs-iconbox_subtitle">...</div>
              </div>
            </div>
            <div class="cs-height_25 cs-height_lg_25"></div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div class="cs-iconbox cs-style1 cs-type1">
              <div class="cs-iconbox_icon cs-center">
                <img src="assets/img/icons/icon_box_10.svg" alt="Icon">
              </div>
              <div class="cs-iconbox_in">
                <h3 class="cs-iconbox_title">...</h3>
                <div class="cs-iconbox_subtitle">...</div>
              </div>
            </div>
            <div class="cs-height_25 cs-height_lg_25"></div>
          </div>
        </div>
      </div>
      <div class="cs-height_75 cs-height_lg_45"></div>
    </div>
  </section>
  <!-- End All Feature -->
  <!-- Start Retail Stores -->
  <section class="cs-gradient_bg_1">
    <div class="cs-height_95 cs-height_lg_70"></div>
    <div class="container">
      <div class="cs-seciton_heading cs-style1 text-center">
        <div class="cs-section_subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">...</div>
        <div class="cs-height_10 cs-height_lg_10"></div>
        <h3 class="cs-section_title">...<br>...</h3>
      </div>
      <div class="cs-height_50 cs-height_lg_40"></div>
      <div class="row align-items-center flex-column-reverse-lg">
        <div class="col-xl-6">
          <div class="cs-left_full_width cs-space40">
            <div class="cs-left_sided_img">
              <img src="assets/img/retail-store.png" alt="Retail Stores">
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="cs-height_25 cs-height_lg_40"></div>
          <div class="row wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="col-lg-11 offset-lg-1">
              <div class="row">
                <div class="col-md-6">
                  <div class="cs-iconbox cs-style2 text-center">
                    <div class="cs-iconbox_icon"><img src="assets/img/icons/retail_icon_1.svg" alt="Icon"></div>
                    <h2 class="cs-iconbox_title">...</h2>
                  </div>
                  <div class="cs-height_25 cs-height_lg_25"></div>
                </div>
                <div class="col-md-6">
                  <div class="cs-iconbox cs-style2 text-center">
                    <div class="cs-iconbox_icon"><img src="assets/img/icons/retail_icon_2.svg" alt="Icon"></div>
                    <h2 class="cs-iconbox_title">...</h2>
                  </div>
                  <div class="cs-height_25 cs-height_lg_25"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="row wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="col-lg-11">
              <div class="row">
                <div class="col-md-6">
                  <div class="cs-iconbox cs-style2 text-center">
                    <div class="cs-iconbox_icon"><img src="assets/img/icons/retail_icon_3.svg" alt="Icon"></div>
                    <h2 class="cs-iconbox_title">...</h2>
                  </div>
                  <div class="cs-height_25 cs-height_lg_25"></div>
                </div>
                <div class="col-md-6">
                  <div class="cs-iconbox cs-style2 text-center">
                    <div class="cs-iconbox_icon"><img src="assets/img/icons/retail_icon_4.svg" alt="Icon"></div>
                    <h2 class="cs-iconbox_title">...</h2>
                  </div>
                  <div class="cs-height_25 cs-height_lg_25"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="row wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s">
            <div class="col-lg-11 offset-lg-1">
              <div class="row">
                <div class="col-md-6">
                  <div class="cs-iconbox cs-style2 text-center">
                    <div class="cs-iconbox_icon"><img src="assets/img/icons/retail_icon_5.svg" alt="Icon"></div>
                    <h2 class="cs-iconbox_title">...</h2>
                  </div>
                  <div class="cs-height_25 cs-height_lg_25"></div>
                </div>
                <div class="col-md-6">
                  <div class="cs-iconbox cs-style2 text-center">
                    <div class="cs-iconbox_icon"><img src="assets/img/icons/retail_icon_6.svg" alt="Icon"></div>
                    <h2 class="cs-iconbox_title">...</h2>
                  </div>
                  <div class="cs-height_25 cs-height_lg_25"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="cs-height_75 cs-height_lg_70"></div>
  </section>
  <!-- End Retail Stores -->
  <!-- End Testimonials Section -->
  <section class="cs-gradient_bg_1">
    <div class="cs-height_95 cs-height_lg_70"></div>
    <div class="container">
      <div class="cs-seciton_heading cs-style1 text-center">
        <div class="cs-section_subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">...</div>
        <div class="cs-height_10 cs-height_lg_10"></div>
        <h3 class="cs-section_title">...</h3>
      </div>
      <div class="cs-height_50 cs-height_lg_40"></div>
      <div class="cs-slider cs-style1 cs-gap-24">
        <div class="cs-slider_container" data-autoplay="0" data-loop="1" data-speed="600" data-fade-slide="0"  data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2" data-md-slides="3" data-lg-slides="3" data-add-slides="3">
          <div class="cs-slider_wrapper">
            <div class="cs-slide">
              <div class="cs-testimonial cs-style1">
                <div class="cs-testimonial_text">...</div>
                <div class="cs-testimonial_meta">
                  <div class="cs-avatar">
                    <img src="assets/img/avatar_1.png" alt="Avatar">
                    <div class="cs-quote cs-center">
                      <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.9033 0.470251C17.974 0.470231 18.0431 0.492568 18.1019 0.534429C18.1606 0.576288 18.2064 0.635782 18.2333 0.705356L18.9732 2.62083C19.0075 2.70954 19.0089 2.80875 18.9772 2.89853C18.9455 2.98831 18.8831 3.06201 18.8024 3.1048C17.5346 3.77738 16.6023 4.83665 16.0311 6.25297C15.8289 6.75453 15.6825 7.27956 15.595 7.81733L17.569 7.81733C17.6636 7.81733 17.7544 7.85732 17.8213 7.92851C17.8882 7.9997 17.9258 8.09624 17.9258 8.19692L17.9258 14.6207C17.9258 14.7213 17.8882 14.8179 17.8213 14.8891C17.7544 14.9603 17.6636 15.0002 17.569 15.0002L10.2806 15.0002C10.1859 15.0002 10.0952 14.9603 10.0283 14.8891C9.96136 14.8179 9.92377 14.7213 9.92377 14.6207L9.92377 10.2215C9.92329 8.5455 10.3244 6.897 11.0891 5.4317C11.8539 3.9664 12.9571 2.73265 14.2946 1.84695C15.2002 1.24811 16.1969 0.821584 17.24 0.586498C17.6221 0.499905 17.8567 0.473809 17.8665 0.472623C17.8787 0.47112 17.891 0.470328 17.9033 0.470251ZM18.19 2.59094L17.6794 1.26856C17.5984 1.28351 17.501 1.3032 17.3895 1.32859C13.4762 2.2142 10.6374 5.95429 10.6374 10.2215L10.6374 14.2411L17.2122 14.2411L17.2122 8.5765L15.1902 8.5765C15.1417 8.57658 15.0936 8.56612 15.049 8.54576C15.0044 8.52541 14.9642 8.49559 14.9308 8.45813C14.8974 8.42066 14.8715 8.37634 14.8548 8.32788C14.838 8.27942 14.8308 8.22783 14.8334 8.17628C14.8354 8.13571 14.8892 7.17133 15.3635 5.98228C15.6341 5.29767 16.0027 4.66176 16.4562 4.09717C16.9467 3.49086 17.5336 2.98102 18.19 2.59094Z" fill="currentColor"/>
                        <path d="M8.42661 0.470251C8.4973 0.470278 8.56638 0.492638 8.6251 0.534494C8.68382 0.576352 8.72953 0.635819 8.75643 0.705356L9.49636 2.62083C9.53062 2.70954 9.53205 2.80875 9.50036 2.89853C9.46867 2.98831 9.40621 3.06201 9.32554 3.1048C8.05777 3.77738 7.12539 4.83665 6.55428 6.25297C6.3522 6.75461 6.20582 7.27961 6.11809 7.81733L8.09211 7.81733C8.18674 7.81733 8.27749 7.85732 8.34441 7.92851C8.41132 7.9997 8.44891 8.09624 8.44891 8.19692L8.44891 14.6207C8.44891 14.7213 8.41132 14.8179 8.34441 14.8891C8.27749 14.9603 8.18674 15.0002 8.09211 15.0002L0.802814 15.0002C0.708182 15.0002 0.617428 14.9603 0.550514 14.8891C0.483601 14.8179 0.446009 14.7213 0.446009 14.6207L0.446009 10.2215C0.442028 7.96623 1.16694 5.77803 2.49922 4.02375C3.8315 2.26946 5.69016 1.05573 7.76363 0.586024C8.14563 0.499431 8.38001 0.473334 8.38982 0.472148C8.40204 0.470806 8.41432 0.470174 8.42661 0.470251ZM8.71339 2.59094L8.2025 1.26856C8.12177 1.28351 8.02409 1.3032 7.91259 1.32859C3.99934 2.2142 1.15962 5.95429 1.15962 10.2215L1.15962 14.2411L7.7353 14.2411L7.7353 8.5765L5.71334 8.5765C5.6648 8.57658 5.61676 8.56612 5.57216 8.54576C5.52755 8.52541 5.48732 8.49559 5.45392 8.45813C5.42052 8.42066 5.39466 8.37634 5.37791 8.32788C5.36117 8.27942 5.35389 8.22783 5.35653 8.17628C5.35854 8.13571 5.41251 7.17133 5.88661 5.98228C6.15719 5.29767 6.5258 4.66177 6.97932 4.09717C7.46979 3.49073 8.05677 2.98087 8.71339 2.59094Z" fill="currentColor"/>
                      </svg>
                    </div>
                  </div>
                  <div class="cs-testimonial_meta_right">
                    <h3>...</h3>
                    <p>...</p>
                    <div class="cs-review" data-review="4">
                      <img src="assets/img/icons/stars.svg" alt="Star">
                      <div class="cs-review_in">
                        <img src="assets/img/icons/stars.svg" alt="Star">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- .cs-slide -->
            <div class="cs-slide">
              <div class="cs-testimonial cs-style1">
                <div class="cs-testimonial_text">...</div>
                <div class="cs-testimonial_meta">
                  <div class="cs-avatar">
                    <img src="assets/img/avatar_2.png" alt="Avatar">
                    <div class="cs-quote cs-center">
                      <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.9033 0.470251C17.974 0.470231 18.0431 0.492568 18.1019 0.534429C18.1606 0.576288 18.2064 0.635782 18.2333 0.705356L18.9732 2.62083C19.0075 2.70954 19.0089 2.80875 18.9772 2.89853C18.9455 2.98831 18.8831 3.06201 18.8024 3.1048C17.5346 3.77738 16.6023 4.83665 16.0311 6.25297C15.8289 6.75453 15.6825 7.27956 15.595 7.81733L17.569 7.81733C17.6636 7.81733 17.7544 7.85732 17.8213 7.92851C17.8882 7.9997 17.9258 8.09624 17.9258 8.19692L17.9258 14.6207C17.9258 14.7213 17.8882 14.8179 17.8213 14.8891C17.7544 14.9603 17.6636 15.0002 17.569 15.0002L10.2806 15.0002C10.1859 15.0002 10.0952 14.9603 10.0283 14.8891C9.96136 14.8179 9.92377 14.7213 9.92377 14.6207L9.92377 10.2215C9.92329 8.5455 10.3244 6.897 11.0891 5.4317C11.8539 3.9664 12.9571 2.73265 14.2946 1.84695C15.2002 1.24811 16.1969 0.821584 17.24 0.586498C17.6221 0.499905 17.8567 0.473809 17.8665 0.472623C17.8787 0.47112 17.891 0.470328 17.9033 0.470251ZM18.19 2.59094L17.6794 1.26856C17.5984 1.28351 17.501 1.3032 17.3895 1.32859C13.4762 2.2142 10.6374 5.95429 10.6374 10.2215L10.6374 14.2411L17.2122 14.2411L17.2122 8.5765L15.1902 8.5765C15.1417 8.57658 15.0936 8.56612 15.049 8.54576C15.0044 8.52541 14.9642 8.49559 14.9308 8.45813C14.8974 8.42066 14.8715 8.37634 14.8548 8.32788C14.838 8.27942 14.8308 8.22783 14.8334 8.17628C14.8354 8.13571 14.8892 7.17133 15.3635 5.98228C15.6341 5.29767 16.0027 4.66176 16.4562 4.09717C16.9467 3.49086 17.5336 2.98102 18.19 2.59094Z" fill="currentColor"/>
                        <path d="M8.42661 0.470251C8.4973 0.470278 8.56638 0.492638 8.6251 0.534494C8.68382 0.576352 8.72953 0.635819 8.75643 0.705356L9.49636 2.62083C9.53062 2.70954 9.53205 2.80875 9.50036 2.89853C9.46867 2.98831 9.40621 3.06201 9.32554 3.1048C8.05777 3.77738 7.12539 4.83665 6.55428 6.25297C6.3522 6.75461 6.20582 7.27961 6.11809 7.81733L8.09211 7.81733C8.18674 7.81733 8.27749 7.85732 8.34441 7.92851C8.41132 7.9997 8.44891 8.09624 8.44891 8.19692L8.44891 14.6207C8.44891 14.7213 8.41132 14.8179 8.34441 14.8891C8.27749 14.9603 8.18674 15.0002 8.09211 15.0002L0.802814 15.0002C0.708182 15.0002 0.617428 14.9603 0.550514 14.8891C0.483601 14.8179 0.446009 14.7213 0.446009 14.6207L0.446009 10.2215C0.442028 7.96623 1.16694 5.77803 2.49922 4.02375C3.8315 2.26946 5.69016 1.05573 7.76363 0.586024C8.14563 0.499431 8.38001 0.473334 8.38982 0.472148C8.40204 0.470806 8.41432 0.470174 8.42661 0.470251ZM8.71339 2.59094L8.2025 1.26856C8.12177 1.28351 8.02409 1.3032 7.91259 1.32859C3.99934 2.2142 1.15962 5.95429 1.15962 10.2215L1.15962 14.2411L7.7353 14.2411L7.7353 8.5765L5.71334 8.5765C5.6648 8.57658 5.61676 8.56612 5.57216 8.54576C5.52755 8.52541 5.48732 8.49559 5.45392 8.45813C5.42052 8.42066 5.39466 8.37634 5.37791 8.32788C5.36117 8.27942 5.35389 8.22783 5.35653 8.17628C5.35854 8.13571 5.41251 7.17133 5.88661 5.98228C6.15719 5.29767 6.5258 4.66177 6.97932 4.09717C7.46979 3.49073 8.05677 2.98087 8.71339 2.59094Z" fill="currentColor"/>
                      </svg>
                    </div>
                  </div>
                  <div class="cs-testimonial_meta_right">
                    <h3>...</h3>
                    <p>...</p>
                    <div class="cs-review" data-review="5">
                      <img src="assets/img/icons/stars.svg" alt="Star">
                      <div class="cs-review_in">
                        <img src="assets/img/icons/stars.svg" alt="Star">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- .cs-slide -->
            <div class="cs-slide">
              <div class="cs-testimonial cs-style1">
                <div class="cs-testimonial_text">...</div>
                <div class="cs-testimonial_meta">
                  <div class="cs-avatar">
                    <img src="assets/img/avatar_3.png" alt="Avatar">
                    <div class="cs-quote cs-center">
                      <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.9033 0.470251C17.974 0.470231 18.0431 0.492568 18.1019 0.534429C18.1606 0.576288 18.2064 0.635782 18.2333 0.705356L18.9732 2.62083C19.0075 2.70954 19.0089 2.80875 18.9772 2.89853C18.9455 2.98831 18.8831 3.06201 18.8024 3.1048C17.5346 3.77738 16.6023 4.83665 16.0311 6.25297C15.8289 6.75453 15.6825 7.27956 15.595 7.81733L17.569 7.81733C17.6636 7.81733 17.7544 7.85732 17.8213 7.92851C17.8882 7.9997 17.9258 8.09624 17.9258 8.19692L17.9258 14.6207C17.9258 14.7213 17.8882 14.8179 17.8213 14.8891C17.7544 14.9603 17.6636 15.0002 17.569 15.0002L10.2806 15.0002C10.1859 15.0002 10.0952 14.9603 10.0283 14.8891C9.96136 14.8179 9.92377 14.7213 9.92377 14.6207L9.92377 10.2215C9.92329 8.5455 10.3244 6.897 11.0891 5.4317C11.8539 3.9664 12.9571 2.73265 14.2946 1.84695C15.2002 1.24811 16.1969 0.821584 17.24 0.586498C17.6221 0.499905 17.8567 0.473809 17.8665 0.472623C17.8787 0.47112 17.891 0.470328 17.9033 0.470251ZM18.19 2.59094L17.6794 1.26856C17.5984 1.28351 17.501 1.3032 17.3895 1.32859C13.4762 2.2142 10.6374 5.95429 10.6374 10.2215L10.6374 14.2411L17.2122 14.2411L17.2122 8.5765L15.1902 8.5765C15.1417 8.57658 15.0936 8.56612 15.049 8.54576C15.0044 8.52541 14.9642 8.49559 14.9308 8.45813C14.8974 8.42066 14.8715 8.37634 14.8548 8.32788C14.838 8.27942 14.8308 8.22783 14.8334 8.17628C14.8354 8.13571 14.8892 7.17133 15.3635 5.98228C15.6341 5.29767 16.0027 4.66176 16.4562 4.09717C16.9467 3.49086 17.5336 2.98102 18.19 2.59094Z" fill="currentColor"/>
                        <path d="M8.42661 0.470251C8.4973 0.470278 8.56638 0.492638 8.6251 0.534494C8.68382 0.576352 8.72953 0.635819 8.75643 0.705356L9.49636 2.62083C9.53062 2.70954 9.53205 2.80875 9.50036 2.89853C9.46867 2.98831 9.40621 3.06201 9.32554 3.1048C8.05777 3.77738 7.12539 4.83665 6.55428 6.25297C6.3522 6.75461 6.20582 7.27961 6.11809 7.81733L8.09211 7.81733C8.18674 7.81733 8.27749 7.85732 8.34441 7.92851C8.41132 7.9997 8.44891 8.09624 8.44891 8.19692L8.44891 14.6207C8.44891 14.7213 8.41132 14.8179 8.34441 14.8891C8.27749 14.9603 8.18674 15.0002 8.09211 15.0002L0.802814 15.0002C0.708182 15.0002 0.617428 14.9603 0.550514 14.8891C0.483601 14.8179 0.446009 14.7213 0.446009 14.6207L0.446009 10.2215C0.442028 7.96623 1.16694 5.77803 2.49922 4.02375C3.8315 2.26946 5.69016 1.05573 7.76363 0.586024C8.14563 0.499431 8.38001 0.473334 8.38982 0.472148C8.40204 0.470806 8.41432 0.470174 8.42661 0.470251ZM8.71339 2.59094L8.2025 1.26856C8.12177 1.28351 8.02409 1.3032 7.91259 1.32859C3.99934 2.2142 1.15962 5.95429 1.15962 10.2215L1.15962 14.2411L7.7353 14.2411L7.7353 8.5765L5.71334 8.5765C5.6648 8.57658 5.61676 8.56612 5.57216 8.54576C5.52755 8.52541 5.48732 8.49559 5.45392 8.45813C5.42052 8.42066 5.39466 8.37634 5.37791 8.32788C5.36117 8.27942 5.35389 8.22783 5.35653 8.17628C5.35854 8.13571 5.41251 7.17133 5.88661 5.98228C6.15719 5.29767 6.5258 4.66177 6.97932 4.09717C7.46979 3.49073 8.05677 2.98087 8.71339 2.59094Z" fill="currentColor"/>
                      </svg>
                    </div>
                  </div>
                  <div class="cs-testimonial_meta_right">
                    <h3>...</h3>
                    <p>...</p>
                    <div class="cs-review" data-review="4.5">
                      <img src="assets/img/icons/stars.svg" alt="Star">
                      <div class="cs-review_in">
                        <img src="assets/img/icons/stars.svg" alt="Star">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- .cs-slide -->
            <div class="cs-slide">
              <div class="cs-testimonial cs-style1">
                <div class="cs-testimonial_text">With Thrive’s help, we were able to increase the functionality of our website dramatically while were able to increase the.</div>
                <div class="cs-testimonial_meta">
                  <div class="cs-avatar">
                    <img src="assets/img/avatar_1.png" alt="Avatar">
                    <div class="cs-quote cs-center">
                      <svg width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.9033 0.470251C17.974 0.470231 18.0431 0.492568 18.1019 0.534429C18.1606 0.576288 18.2064 0.635782 18.2333 0.705356L18.9732 2.62083C19.0075 2.70954 19.0089 2.80875 18.9772 2.89853C18.9455 2.98831 18.8831 3.06201 18.8024 3.1048C17.5346 3.77738 16.6023 4.83665 16.0311 6.25297C15.8289 6.75453 15.6825 7.27956 15.595 7.81733L17.569 7.81733C17.6636 7.81733 17.7544 7.85732 17.8213 7.92851C17.8882 7.9997 17.9258 8.09624 17.9258 8.19692L17.9258 14.6207C17.9258 14.7213 17.8882 14.8179 17.8213 14.8891C17.7544 14.9603 17.6636 15.0002 17.569 15.0002L10.2806 15.0002C10.1859 15.0002 10.0952 14.9603 10.0283 14.8891C9.96136 14.8179 9.92377 14.7213 9.92377 14.6207L9.92377 10.2215C9.92329 8.5455 10.3244 6.897 11.0891 5.4317C11.8539 3.9664 12.9571 2.73265 14.2946 1.84695C15.2002 1.24811 16.1969 0.821584 17.24 0.586498C17.6221 0.499905 17.8567 0.473809 17.8665 0.472623C17.8787 0.47112 17.891 0.470328 17.9033 0.470251ZM18.19 2.59094L17.6794 1.26856C17.5984 1.28351 17.501 1.3032 17.3895 1.32859C13.4762 2.2142 10.6374 5.95429 10.6374 10.2215L10.6374 14.2411L17.2122 14.2411L17.2122 8.5765L15.1902 8.5765C15.1417 8.57658 15.0936 8.56612 15.049 8.54576C15.0044 8.52541 14.9642 8.49559 14.9308 8.45813C14.8974 8.42066 14.8715 8.37634 14.8548 8.32788C14.838 8.27942 14.8308 8.22783 14.8334 8.17628C14.8354 8.13571 14.8892 7.17133 15.3635 5.98228C15.6341 5.29767 16.0027 4.66176 16.4562 4.09717C16.9467 3.49086 17.5336 2.98102 18.19 2.59094Z" fill="currentColor"/>
                        <path d="M8.42661 0.470251C8.4973 0.470278 8.56638 0.492638 8.6251 0.534494C8.68382 0.576352 8.72953 0.635819 8.75643 0.705356L9.49636 2.62083C9.53062 2.70954 9.53205 2.80875 9.50036 2.89853C9.46867 2.98831 9.40621 3.06201 9.32554 3.1048C8.05777 3.77738 7.12539 4.83665 6.55428 6.25297C6.3522 6.75461 6.20582 7.27961 6.11809 7.81733L8.09211 7.81733C8.18674 7.81733 8.27749 7.85732 8.34441 7.92851C8.41132 7.9997 8.44891 8.09624 8.44891 8.19692L8.44891 14.6207C8.44891 14.7213 8.41132 14.8179 8.34441 14.8891C8.27749 14.9603 8.18674 15.0002 8.09211 15.0002L0.802814 15.0002C0.708182 15.0002 0.617428 14.9603 0.550514 14.8891C0.483601 14.8179 0.446009 14.7213 0.446009 14.6207L0.446009 10.2215C0.442028 7.96623 1.16694 5.77803 2.49922 4.02375C3.8315 2.26946 5.69016 1.05573 7.76363 0.586024C8.14563 0.499431 8.38001 0.473334 8.38982 0.472148C8.40204 0.470806 8.41432 0.470174 8.42661 0.470251ZM8.71339 2.59094L8.2025 1.26856C8.12177 1.28351 8.02409 1.3032 7.91259 1.32859C3.99934 2.2142 1.15962 5.95429 1.15962 10.2215L1.15962 14.2411L7.7353 14.2411L7.7353 8.5765L5.71334 8.5765C5.6648 8.57658 5.61676 8.56612 5.57216 8.54576C5.52755 8.52541 5.48732 8.49559 5.45392 8.45813C5.42052 8.42066 5.39466 8.37634 5.37791 8.32788C5.36117 8.27942 5.35389 8.22783 5.35653 8.17628C5.35854 8.13571 5.41251 7.17133 5.88661 5.98228C6.15719 5.29767 6.5258 4.66177 6.97932 4.09717C7.46979 3.49073 8.05677 2.98087 8.71339 2.59094Z" fill="currentColor"/>
                      </svg>
                    </div>
                  </div>
                  <div class="cs-testimonial_meta_right">
                    <h3>Edward Wolfe</h3>
                    <p>Customer</p>
                    <div class="cs-review" data-review="4">
                      <img src="assets/img/icons/stars.svg" alt="Star">
                      <div class="cs-review_in">
                        <img src="assets/img/icons/stars.svg" alt="Star">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div><!-- .cs-slide -->
          </div>
        </div><!-- .cs-slider_container -->
        <div class="cs-pagination cs-style1"></div>
      </div><!-- .cs-slider -->
    </div>
    <div class="cs-height_100 cs-height_lg_70"></div>
  </section>
  <!-- End Testimonials Stores -->

  <!-- End Client Section -->
  <section class="cs-bg" data-src="assets/img/feature_bg.svg">
    <div class="cs-height_95 cs-height_lg_70"></div>
    <div class="container">
      <div class="cs-seciton_heading cs-style1 text-center">
        <div class="cs-section_subtitle">Our Client</div>
        <div class="cs-height_10 cs-height_lg_10"></div>
        <h3 class="cs-section_title">Who we partner with</h3>
      </div>
      <div class="cs-height_50 cs-height_lg_40"></div>
      <div class="cs-slider cs-style1 cs-gap-24">
        <div class="cs-slider_container" data-autoplay="0" data-loop="1" data-speed="600" data-fade-slide="0"  data-slides-per-view="responsive" data-xs-slides="2" data-sm-slides="3" data-md-slides="4" data-lg-slides="6" data-add-slides="6">
          <div class="cs-slider_wrapper">
            <div class="cs-slide">
              <div class="cs-client cs-accent_bg cs-center">
                <img src="assets/img/client_1.svg" alt="Client">
              </div>
            </div><!-- .cs-slide -->
            <div class="cs-slide">
              <div class="cs-client cs-accent_bg cs-center">
                <img src="assets/img/client_2.svg" alt="Client">
              </div>
            </div><!-- .cs-slide -->
            <div class="cs-slide">
              <div class="cs-client cs-accent_bg cs-center">
                <img src="assets/img/client_3.svg" alt="Client">
              </div>
            </div><!-- .cs-slide -->
            <div class="cs-slide">
              <div class="cs-client cs-accent_bg cs-center">
                <img src="assets/img/client_4.svg" alt="Client">
              </div>
            </div><!-- .cs-slide -->
            <div class="cs-slide">
              <div class="cs-client cs-accent_bg cs-center">
                <img src="assets/img/client_5.svg" alt="Client">
              </div>
            </div><!-- .cs-slide -->
            <div class="cs-slide">
              <div class="cs-client cs-accent_bg cs-center">
                <img src="assets/img/client_6.svg" alt="Client">
              </div>
            </div><!-- .cs-slide -->
            <div class="cs-slide">
              <div class="cs-client cs-accent_bg cs-center">
                <img src="assets/img/client_3.svg" alt="Client">
              </div>
            </div><!-- .cs-slide -->
          </div>
        </div><!-- .cs-slider_container -->
        <div class="cs-pagination cs-style1"></div>
      </div><!-- .cs-slider -->
    </div>
    <div class="cs-height_100 cs-height_lg_70"></div>
  </section>
  <!-- End Client Stores -->

  <!-- Start Footer -->
  <footer class="cs-footer">
    <div class="cs-height_75 cs-height_lg_70"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="cs-footer_item">
            <div class="cs-footer_widget_text">
              <img src="assets/img/sukajadi-logo.svg" alt="Logo">
              <p>
               <br>kantor kecamatan sukajadi
               <br>Jl. Sukamulya No.4 
              </p>
            </div>
            <div class="cs-height_30 cs-height_lg_30"></div>
            <div class="cs-social_btns cs-style1">
              <a href="#"><img src="assets/img/facebook.svg" alt="Facebook"></a>
              <a href="#"><img src="assets/img/twitter.svg" alt="Twitter"></a>
              <a href="#"><img src="assets/img/instagram.svg" alt="Instagram"></a>
            </div>
          </div>
        </div><!-- .col -->
        <div class="col-lg-3 col-md-6">
          <div class="cs-footer_item widget_nav_menu">
            <h2 class="cs-widget_title">Available POS</h2>
            <ul class="menu">
              <li><a href="#">Food Delivery</a></li>
              <li><a href="#">Furniture Store</a></li>
              <li><a href="#">Coffee Shop</a></li>
              <li><a href="#">Clothing Store</a></li>
              <li><a href="#">eCommerce</a></li>
            </ul>
          </div>
        </div><!-- .col -->
        <div class="col-lg-3 col-md-6">
          <div class="cs-footer_item widget_nav_menu">
            <h2 class="cs-widget_title">Company</h2>
            <ul class="menu">
              <li><a href="#">Features</a></li>
              <li><a href="#">FAQ</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <li><a href="#">Terms of Use</a></li>
            </ul>
          </div>
        </div><!-- .col -->
      </div>
    </div>
    <div class="cs-height_40 cs-height_lg_30"></div>
    <div class="cs-copyright text-center">
      <div class="container">Copyright 2023. Created by SI UNIKOM.</div>
    </div>
  </footer>
  <!-- End Footer -->

  <!-- Script -->
  <script src="assets/js/plugins/jquery-3.6.0.min.js"></script>
  <script src="assets/js/plugins/jquery.slick.min.js"></script>
  <script src="assets/js/plugins/jquery.counter.min.js"></script>
  <script src="assets/js/plugins/wow.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
