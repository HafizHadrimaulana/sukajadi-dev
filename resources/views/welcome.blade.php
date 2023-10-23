<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon Icon -->
  <link rel="icon" href="assets/img/sukajadi-logo.svg">
  <!-- Site Title -->
  <title>@yield('judul') | {{ config('app.name') }}</title>
  <link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-Bd1wty3WALnARDD67cRwdo5p0PD60fphF7Q1F9tn8u6d9RE/0Qnm8U69l7c1Zn2Q" crossorigin="anonymous">

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
                            <li><a href="/" class="cs-smoth_scroll">Beranda</a></li>
                            <li><a href="{{ route('kegiatan') }}" class="cs-smoth_scroll">Kegiatan</a></li>
                            <li><a href="{{ route('data') }}" class="cs-smoth_scroll">Data</a></li>
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
</center>>
    <script>
        var botmanWidget = {
            aboutText:'Kecamatan Sukajadi, 2023',
            introMessage :'Halo, Saya adalah BOT! Apakah ada yang bisa saya bantu?',
        };
    </script>
    <script>
window.addEventListener('load', function() {
    // Pilih elemen target untuk diobservasi
    var targetElement = document.body; // Ini perlu diubah ke document.body atau elemen div yang sesuai

    // Opsi konfigurasi untuk observer
    var config = {
        childList: true,
        subtree: true // mengobservasi perubahan pada elemen target dan semua keturunannya
    };

    // Callback function untuk eksekusi ketika mutasi terdeteksi
    var callback = function(mutationsList, observer) {
        for(var mutation of mutationsList) {
            if (mutation.type === 'childList') {
                var titleElement = document.querySelector('.botman-title'); // Gantilah ini sesuai dengan class atau id yang sesungguhnya
                if (titleElement) {
                    titleElement.textContent = 'Kecamatan Sukajadi';
                    observer.disconnect(); // Hentikan observer setelah judul berhasil diubah
                    return; // Keluar dari loop dan fungsi
                }
            }
        }
    };

    // Buat instance observer dengan callback function
    var observer = new MutationObserver(callback);

    // Mulai observasi
    observer.observe(targetElement, config);
});

   </script>

    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0.0/build/js/widget.min.js'></script>
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
      <div class="row box-container">
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
      <div class="cs-iconbox_subtitle">Remsbug Warga</div>
    </div>
  </div>
  <div class="cs-height_25 cs-height_lg_25"></div>
</div>
<center>
  <div class="container">
  <div class="chart-container">
        <canvas id="myChart" width="1000" height="200"></canvas>
        <select id="selectYear">
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
        </select>
    </div>
    </div>
      </center>
      <div class="cs-height_75 cs-height_lg_45"></div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var selectYear = document.getElementById('selectYear');

    var data = {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
        datasets: [
            {
                label: 'KK',
                data: [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'KTP',
                data: [5, 15, 25, 35, 45, 55, 65, 75, 85, 95, 105, 115],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            },
            {
                label: 'Pindah',
                data: [12, 24, 36, 48, 60, 72, 84, 96, 108, 120, 132, 144],
                backgroundColor: 'rgba(255, 206, 86, 0.2)',
                borderColor: 'rgba(255, 206, 86, 1)',
                borderWidth: 1
            },
            {
                label: 'Lainnya',
                data: [7, 14, 21, 28, 35, 42, 49, 56, 63, 70, 77, 84],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }
        ]
    };

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            responsive: true
        }
    });

    // Event listener untuk perubahan tahun, Anda bisa menyesuaikannya seperti sebelumnya
    selectYear.addEventListener('change', function () {
        var selectedYear = selectYear.value;
        drawChart(selectedYear);
    });

    // Fungsi drawChart() Anda bisa menyesuaikannya seperti sebelumnya
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
               <br>Jl. Sukamulya No. 4 Kota Bandung 40161
              </p>
            </div>
            <div class="cs-height_30 cs-height_lg_30"></div>
            <div class="cs-social_btns cs-style1">
            
            </div>
          </div>
        </div><!-- .col -->
        <div class="col-lg-3 col-md-6">
          <div class="cs-footer_item widget_nav_menu">
          
            <ul class="menu">
            <h2 class="cs-widget_title">Sosial Media</h2>
            <a href="https://www.facebook.com/people/kec_sukajadi/100068761213783/"><img src="assets/img/fb.png">&nbsp;&nbsp;Facebook</a>
            <br><br>
            <a href="https://twitter.com/Kec_Sukajadi"><img src="assets/img/x.png">&nbsp;&nbsp;X</a>
            <br><br>
            <a href="https://instagram.com/Kec_Sukajadi"><img src="assets/img/ig.png">&nbsp;&nbsp;Instagram</a>
       
            </ul>
          </div>
        </div><!-- .col -->
        <div class="col-lg-3 col-md-6">
          <div class="cs-footer_item widget_nav_menu">
            <h2 class="cs-widget_title">Kontak</h2>
            <ul class="menu">
               <a href="https://wa.me/082118717109"><img src="assets/img/wa.png">&nbsp;&nbsp;0821-1871-7109</a>
               <br><br>
               <a href="#"><img src="assets/img/email.png">&nbsp;kecamatansukajadi04@gmail.com</a>
              
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
