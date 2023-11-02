<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="ThemeMarch">
  <!-- Favicon Icon -->
  <link rel="icon" href="assets/img/sukajadi-logo.svg">
  <!-- Site Title -->
  <title>{{ config('app.name') }}</title>
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-Bd1wty3WALnARDD67cRwdo5p0PD60fphF7Q1F9tn8u6d9RE/0Qnm8U69l7c1Zn2Q" crossorigin="anonymous"> --}}

</head>

<body>
  <div class="cs-preloader cs-white_bg cs-center">
    <div class="cs-preloader_in">
      <img src="assets/img/sukajadi-logo.svg" alt="Logo">
    </div>
  </div>
  <!-- Start Header Section -->
  <header class="cs-site_header cs-style1 cs-sticky-header cs-primary_color cs-white_bg wow fadeInRight" data-wow-duration="1.5s" data-wow-delay="1s">
    <div class="cs-main_header">
        <div class="container">
            <div class="cs-main_header_in">
                <div class="cs-main_header_left">
                    <a class="cs-site_branding cs-accent_color" >
                       <span href="/" class="custom-text"><b>PORTAL</b> | Kewilayahan</span>
                    </a>
                </div>
                <div class="cs-main_header_center">
                    <div class="cs-nav">
                        <ul class="cs-nav_list">
                          <li><a href="/" class="cs-smoth_scroll"><b>Beranda</b></a></li>
                          <li><a href="{{ route('kegiatan') }}" class="cs-smoth_scroll"><b>Kegiatan</b></a></li>
                          <li><a href="{{ route('data') }}" class="cs-smoth_scroll"><b>Data</b></a></li>
                          <li><a href="{{ route('posyandu') }}" class="cs-smoth_scroll"><b>Posyandu</b></a></li>
                          <li><a href="{{ route('rembug-warga') }}" class="cs-smoth_scroll"><b>Rembug Warga</b></a></li>
                        </ul>
                    </div>
                </div>
                <!-- Masukkan kode yang baru Anda berikan di sini -->
                <div class="cs-main_header_right">
                  <div class="cs-toolbox">
                   @if (!Auth::check())
                   <a href="{{ route('login') }}" class="cs-btn cs-color1 cs-modal_btn">
                    <span class="cs-btn cs-color1 cs-modal_btn" data-modal="login">Login</span>
                  </a>
                  @endif
                  </div>
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
  {{-- <center>
<img src="https://sukajadi.bandung.go.id/portal/upload/logo.png" style="height: 8rem;" data-pagespeed-url-hash="858298967" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
<img src="https://sukajadi.bandung.go.id/portal/upload/logo2.png" style="height: 8rem;" data-pagespeed-url-hash="1797676001" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
</center>> --}}
    <script>
        var botmanWidget = {
            aboutText:'Kecamatan Sukajadi, 2023',
            introMessage :'Halo, Saya adalah BOT! Apakah ada yang bisa saya bantu?',
        };
    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0.0/build/js/widget.min.js'></script>
<section class="cs-hero cs-style1 cs-bg" style="background: url('assets/img/wallpaper.svg') no-repeat fixed left bottom;background-size:cover;')">
      <div class="container">
        <div class="cs-hero_img">
          <div class="cs-hero_img_bg cs-bg" data-src="assets/img/hero_img_bg.png"></div>
          <img src="assets/img/hero_img.png" alt="Hero Image" class="wow fadeInRight" data-wow-duration="1.5s" data-wow-delay="1s">
        </div>

        <div class="cs-hero_text wow fadeInRight" data-wow-duration="1.5s" data-wow-delay="1s"  >
          <div class="cs-hero_secondary_title">Selamat Datang
          </div>
          <h1 class="cs-hero_title">KECAMATAN SUKAJADI<br>KOTA BANDUNG</h1>
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
  <section data-src="assets/img/feature_bg.svg">>
    <div class="cs-height_95 cs-height_lg_70"></div>
    <div class="container">
      <div class="cs-seciton_heading cs-style1 text-center">
        <div class="cs-height_10 cs-height_lg_10"></div>
        <h3 class="cs-section_title">DATA & GRAFIK</h3>
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
      <img src="assets/img/icons/icon_box_2.svg">
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
<section id="agenda" class="cs-hero cs-style1 cs-bg" style="background: url('assets/img/wallpaper.svg') no-repeat fixed left bottom;background-size:cover;')">
  <div class="container">
      <div class="row">
          <div class="col-md-4">
              <div class="card">
                  <div class="card-header bg-secondary">
                      <h3 class="card-title"><b>Agenda Hari ini (5)</b></h3>
                      <div class="card-tools">
                          <!-- Add any tools here -->
                      </div>
                  </div>
                  <div class="card-body" style="overflow-y: auto; height: 55vh;">
                      <ul class="list-group">
                          <li class="list-group-item">
                              <div>
                                  Undangan TFT (Training for Trainer) Ayah
                                  <span class="badge bg-black float-end">08:00</span>
                              </div>
                              <small class="text-muted">Agenda Kecamatan Sukajadi</small>
                          </li>
                          <!-- Add more list items here -->
                      </ul>
                  </div>
              </div>
          </div>

          <div class="col-md-8">
              <div class="card">
                  <div class="card-header bg-secondary">
                      <h3 class="card-title"><b>Selayang Pandang</b></h3>
                      <div class="card-tools">
                          <!-- Add any tools here -->
                      </div>
                  </div>
                  <div class="card-body" style="overflow-x: scroll; height: 55vh;">
                      <iframe style="display: block; width: 98%; height: 100%;" src="https://drive.google.com/file/d/12UTeTfALhe2w64YFQQPsXBhr-Kf3eaqx/preview?usp=sharing" title="Link"></iframe>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>
  <!-- Start About -->
  <section class="cs-bg" data-src="assets/img/feature_bg.svg">
    <div class="cs-height_95 cs-height_lg_70"></div>
    <div class="container">
      <div class="cs-seciton_heading cs-style1 text-center">
        <div class="cs-section_subtitle wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s"></div>
        <div class="cs-height_10 cs-height_lg_10"></div>
        <h3 class="cs-section_title"><b>MEDIA SOSIAL</b></h3>
      </div>
      <div class="cs-height_50 cs-height_lg_40"></div>
      <div class="row">
        <div class="col-lg-4">
          <div class="cs-pricing_table cs-style1">
            <div class="cs-pricing_head">
              <div class="cs-pricing_heading">
                <div class="cs-pricing_icon cs-center"><img src="assets/img/facebook.svg"></div>
                <h2 class="cs-pricing_title cs-m0"><b>Facebook</b></h2>
              </div>
            </div>
            <center>
            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fkec_sukajadi-100384031598775%2F&amp;tabs=timeline&amp;width=330&amp;height=525&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId" width="330" height="525" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
            </center>
          </div>
          <div class="cs-height_25 cs-height_lg_25"></div>
        </div>
        <div class="col-lg-4">
          <div class="cs-pricing_table cs-style1">
            <div class="cs-pricing_head">
              <div class="cs-pricing_heading">
                <div class="cs-pricing_icon cs-center"><img src="assets/img/twitter.svg"></div>
                <h2 class="cs-pricing_title cs-m0"><b>Twitter</b></h2>
              </div>
            </div>
            <center>
              <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" class="" style="position: static; visibility: visible; width: 300px; height: 415px; display: block; flex-grow: 1;" title="Twitter Timeline" src="https://syndication.twitter.com/srv/timeline-profile/screen-name/Kec_Sukajadi?dnt=false&amp;embedId=twitter-widget-0&amp;features=eyJ0ZndfdGltZWxpbmVfbGlzdCI6eyJidWNrZXQiOltdLCJ2ZXJzaW9uIjpudWxsfSwidGZ3X2ZvbGxvd2VyX2NvdW50X3N1bnNldCI6eyJidWNrZXQiOnRydWUsInZlcnNpb24iOm51bGx9LCJ0ZndfdHdlZXRfZWRpdF9iYWNrZW5kIjp7ImJ1Y2tldCI6Im9uIiwidmVyc2lvbiI6bnVsbH0sInRmd19yZWZzcmNfc2Vzc2lvbiI6eyJidWNrZXQiOiJvbiIsInZlcnNpb24iOm51bGx9LCJ0ZndfZm9zbnJfc29mdF9pbnRlcnZlbnRpb25zX2VuYWJsZWQiOnsiYnVja2V0Ijoib24iLCJ2ZXJzaW9uIjpudWxsfSwidGZ3X21peGVkX21lZGlhXzE1ODk3Ijp7ImJ1Y2tldCI6InRyZWF0bWVudCIsInZlcnNpb24iOm51bGx9LCJ0ZndfZXhwZXJpbWVudHNfY29va2llX2V4cGlyYXRpb24iOnsiYnVja2V0IjoxMjA5NjAwLCJ2ZXJzaW9uIjpudWxsfSwidGZ3X3Nob3dfYmlyZHdhdGNoX3Bpdm90c19lbmFibGVkIjp7ImJ1Y2tldCI6Im9uIiwidmVyc2lvbiI6bnVsbH0sInRmd19kdXBsaWNhdGVfc2NyaWJlc190b19zZXR0aW5ncyI6eyJidWNrZXQiOiJvbiIsInZlcnNpb24iOm51bGx9LCJ0ZndfdXNlX3Byb2ZpbGVfaW1hZ2Vfc2hhcGVfZW5hYmxlZCI6eyJidWNrZXQiOiJvbiIsInZlcnNpb24iOm51bGx9LCJ0ZndfdmlkZW9faGxzX2R5bmFtaWNfbWFuaWZlc3RzXzE1MDgyIjp7ImJ1Y2tldCI6InRydWVfYml0cmF0ZSIsInZlcnNpb24iOm51bGx9LCJ0ZndfbGVnYWN5X3RpbWVsaW5lX3N1bnNldCI6eyJidWNrZXQiOnRydWUsInZlcnNpb24iOm51bGx9LCJ0ZndfdHdlZXRfZWRpdF9mcm9udGVuZCI6eyJidWNrZXQiOiJvbiIsInZlcnNpb24iOm51bGx9fQ%3D%3D&amp;frame=false&amp;hideBorder=false&amp;hideFooter=false&amp;hideHeader=false&amp;hideScrollBar=false&amp;lang=id&amp;origin=https%3A%2F%2Fsukajadi.bandung.go.id%2Fportal%2F&amp;sessionId=b0830a9466115dd08a730f6641add6ab7f3fc14f&amp;showHeader=true&amp;showReplies=false&amp;transparent=false&amp;widgetsVersion=01917f4d1d4cb%3A1696883169554"></iframe>
            </center>
          </div>
          <div class="cs-height_25 cs-height_lg_25"></div>
        </div>
        <div class="col-lg-4">
          <div class="cs-pricing_table cs-style1">
            <div class="cs-pricing_head">
              <div class="cs-pricing_heading">
                <div class="cs-pricing_icon cs-center"><img src="assets/img/instagram.svg"></div>
                <h2 class="cs-pricing_title cs-m0"><b>Instagram</b></h2>
              </div>
            </div>
            <center>
              <iframe src="https://widgets.woxo.tech/f4dfe12b-8bf2-47f1-b4cb-43b07e0bf90b#mission-control-component-2b7293a1-b29d-4709-8b76-1b358fc2af44" title="Instagram widgets for website" data-hj-allow-iframe="true" style="width: 100%; height: 100%; border: none; overflow: hidden; opacity: 100; transition: all 0.5s ease 0s;"></iframe>
            </center>
          </div>
          <div class="cs-height_25 cs-height_lg_25"></div>
        </div>
      </div>
      <div class="cs-height_75 cs-height_lg_45"></div>
    </div>
  </section>
  <!-- End Retail Stores -->
  <!-- Start Footer -->
  <footer class="cs-footer">
    <div class="cs-height_30 cs-height_lg_20"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="cs-footer_item">
            <div class="cs-footer_widget_text">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.9837031494253!2d107.5856049755271!3d-6.892552267449541!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e6636e2ff101%3A0x61b8a9b5b9162459!2sKantor%20Kecamatan%20SUKAJADI!5e0!3m2!1sid!2sid!4v1698183714051!5m2!1sid!2sid" width="500" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              <p>
               <b href="https://maps.app.goo.gl/yujf3FWo1rP9uMfx5">Jl. Sukamulya No. 4 Kota Bandung 40161</b>
              </p>
            </div>
            <div class="cs-height_20 cs-height_lg_20"></div>
            <div class="cs-social_btns cs-style1">
            
            </div>
          </div>
        </div><!-- .col -->
        <div class="col-lg-3 col-md-6">
          <div class="cs-footer_item widget_nav_menu">

          </div>
        </div><!-- .col -->
        <div class="col-lg-3 col-md-6">
          <div class="cs-footer_item widget_nav_menu">
            <h2 class="cs-widget_title">Sosial Media</h2>
            <ul class="menu">
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
        </div>
      </div>
    </div>
    <div class="cs-height_10 cs-height_lg_20"></div>
    <div class="cs-copyright text-center">
      <strong>Copyright &copy; <script>document.write(new Date().getFullYear())</script>
          <a>Developer Kecamatan Sukajadi</a>.</strong>
      All rights reserved.
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
