<x-landing-layout>
    <div class="masthead">
        <div class="text-center mb-3">
            <img src="{{ asset('images/logo.png') }}" style="height:6rem;"/>
            <img src="{{ asset('images/logo2.png') }}" style="height:6rem;"/>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 animasi-kiri">
                    <div class="masthead-subheading">Selamat datang</div>
                    <div class="masthead-heading text-uppercase">
                        Kecamatan Sukajadi <br> KOTA BANDUNG
                   </div>
                   <div class="masthead-subheading">
                        <h3><a class="text-black" href="https://goo.gl/maps/gRh2ttacVEXej3ec9" target="blank"><i class="fa fa-map-marker"></i></a> Jl. Sukamulya No. 4 </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5 data">
        <h2 class="fs-1 text-center fw-bold mb-5">DATA & GRAFIK</h2>

        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href="#">
                    <div class="small-box bg-color">
                        <div class="inner">
                            <script type="text/javascript">
                                window.setTimeout("waktu()", 1000);

                                function waktu() {
                                    var waktu = new Date();
                                    setTimeout("waktu()", 1000);
                                    document.getElementById("jam").innerHTML = checkTime(waktu.getHours()) + ":" +
                                        checkTime(waktu.getMinutes()) + ":" + checkTime(waktu.getSeconds());
                                    var tanggallengkap = new String();
                                    var namahari = ("Minggu Senin Selasa Rabu Kamis Jumat Sabtu");
                                    namahari = namahari.split(" ");
                                    var namabulan = ("Jan Feb Mar Apr Mei Jun Jul Ags Sep Okt Nov Des");
                                    namabulan = namabulan.split(" ");
                                    var tgl = new Date();
                                    var hari = tgl.getDay();
                                    var tanggal = tgl.getDate();
                                    var bulan = tgl.getMonth();
                                    var bulan3 = tgl.getMonth() + 1;
                                    var tahun = tgl.getFullYear().toString().substr(2, 2);
                                    document.getElementById("tanggal2").innerHTML = tanggal + " " + namabulan[bulan] + " " +
                                        tahun;
                                    document.getElementById("tanggal3").innerHTML = tanggal + " / " + bulan3;
                                    document.getElementById("hari2").innerHTML = namahari[hari];
                                }

                                function checkTime(i) {
                                    if (i < 10) {
                                        i = "0" + i
                                    };
                                    return i;
                                }
                            </script>

                            <h3 class="hidden-xs"><span id="tanggal2">23 Jan 24</span></h3>
                            {{-- <h3 class="hidden-sm hidden-md hidden-lg"><span id="tanggal3">23 / 1</span></h3> --}}

                            <p><span id="jam">01:14:19</span> - <span id="hari2">Selasa</span></p>

                        </div>
                        <div class="icon">
                            <i class="fa fa-calendar-alt"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-6">
                <a href="https://wa.me/6282118717109">
                    <div class="small-box bg-white">
                        <div class="inner">
                            <h3>Layanan</h3>
                            <p>Kependudukan</p>
                        </div>
                        <div class="icon">
                            <i class="fa-whatsapp fab"></i>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-6">
                <a href="#">
                <div class="small-box bg-white">
                    <div class="inner">
                        <h3>27.103</h3>
                        <p>Rekap Vaksinasi</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-syringe"></i>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 col-6">
                <a href="#">
                <div class="small-box bg-white">
                    <div class="inner">
                        <h3>77</h3>
                        <p>Posyandu</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-hospital"></i>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 col-6">
                
                <a href="#">
                <div class="small-box bg-white">
                    <div class="inner">
                        <h3>Prestasi</h3>
                        <p>Tahun Ini</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 col-6">
                <a href="#">
                <div class="small-box bg-white">
                    <div class="inner">
                        <h3>6.201</h3>
                        <p>Data</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-database"></i>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 col-6">
                <a href="#">
                <div class="small-box bg-white">
                    <div class="inner">
                        <h3>1.192</h3>
                        <p>Dutabulin</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-child"></i>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 col-6">
                <a href="#">
                <div class="small-box bg-white">
                    <div class="inner">
                        <h3>816</h3>
                        <p>Rembug Warga</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-comments"></i>
                    </div>
                </div>
                </a>
            </div>
        </div>

        <div class="card">
            <div class="bg-white card-header py-3">
                <h3 class="card-title fw-bold mb-0">Grafik Layanan Kependudukan</h3>
                <div class="card-tools">
                    
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="barChart"
                        style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 487px;"
                        width="487" height="250" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
        </div>
    </div>

    <section id="sosmed">
        <div class="container">
            <h2 class="fs-1 text-center fw-bold mb-5">MEDIA SOSIAL</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="bg-white card-header py-3">
                            <h3 class="card-title fw-bold mb-0">Facebook</h3>
                            <div class="card-tools">
                                
                            </div>
                        </div>
                        <div class="card-body bg-white">
                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fkec_sukajadi-100384031598775%2F&amp;tabs=timeline&amp;width=330&amp;height=525&amp;small_header=false&amp;adapt_container_width=true&amp;hide_cover=false&amp;show_facepile=true&amp;appId" width="330" height="525" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="bg-white card-header py-3">
                            <h3 class="card-title fw-bold mb-0">Twitter</h3>
                            <div class="card-tools">
                                
                            </div>
                        </div>
                        <div class="card-body bg-white">
                            <iframe id="twitter-widget-0" scrolling="no" frameborder="0" allowtransparency="true" allowfullscreen="true" class="" style="position: static; visibility: visible; width: 300px; height: 415px; display: block; flex-grow: 1;" title="Twitter Timeline" src="https://syndication.twitter.com/srv/timeline-profile/screen-name/Kec_Sukajadi?dnt=false&amp;embedId=twitter-widget-0&amp;features=eyJ0ZndfdGltZWxpbmVfbGlzdCI6eyJidWNrZXQiOltdLCJ2ZXJzaW9uIjpudWxsfSwidGZ3X2ZvbGxvd2VyX2NvdW50X3N1bnNldCI6eyJidWNrZXQiOnRydWUsInZlcnNpb24iOm51bGx9LCJ0ZndfdHdlZXRfZWRpdF9iYWNrZW5kIjp7ImJ1Y2tldCI6Im9uIiwidmVyc2lvbiI6bnVsbH0sInRmd19yZWZzcmNfc2Vzc2lvbiI6eyJidWNrZXQiOiJvbiIsInZlcnNpb24iOm51bGx9LCJ0ZndfZm9zbnJfc29mdF9pbnRlcnZlbnRpb25zX2VuYWJsZWQiOnsiYnVja2V0Ijoib24iLCJ2ZXJzaW9uIjpudWxsfSwidGZ3X21peGVkX21lZGlhXzE1ODk3Ijp7ImJ1Y2tldCI6InRyZWF0bWVudCIsInZlcnNpb24iOm51bGx9LCJ0ZndfZXhwZXJpbWVudHNfY29va2llX2V4cGlyYXRpb24iOnsiYnVja2V0IjoxMjA5NjAwLCJ2ZXJzaW9uIjpudWxsfSwidGZ3X3Nob3dfYmlyZHdhdGNoX3Bpdm90c19lbmFibGVkIjp7ImJ1Y2tldCI6Im9uIiwidmVyc2lvbiI6bnVsbH0sInRmd19kdXBsaWNhdGVfc2NyaWJlc190b19zZXR0aW5ncyI6eyJidWNrZXQiOiJvbiIsInZlcnNpb24iOm51bGx9LCJ0ZndfdXNlX3Byb2ZpbGVfaW1hZ2Vfc2hhcGVfZW5hYmxlZCI6eyJidWNrZXQiOiJvbiIsInZlcnNpb24iOm51bGx9LCJ0ZndfdmlkZW9faGxzX2R5bmFtaWNfbWFuaWZlc3RzXzE1MDgyIjp7ImJ1Y2tldCI6InRydWVfYml0cmF0ZSIsInZlcnNpb24iOm51bGx9LCJ0ZndfbGVnYWN5X3RpbWVsaW5lX3N1bnNldCI6eyJidWNrZXQiOnRydWUsInZlcnNpb24iOm51bGx9LCJ0ZndfdHdlZXRfZWRpdF9mcm9udGVuZCI6eyJidWNrZXQiOiJvbiIsInZlcnNpb24iOm51bGx9fQ%3D%3D&amp;frame=false&amp;hideBorder=false&amp;hideFooter=false&amp;hideHeader=false&amp;hideScrollBar=false&amp;lang=id&amp;origin=https%3A%2F%2Fsukajadi.bandung.go.id%2Fportal%2F&amp;sessionId=b0830a9466115dd08a730f6641add6ab7f3fc14f&amp;showHeader=true&amp;showReplies=false&amp;transparent=false&amp;widgetsVersion=01917f4d1d4cb%3A1696883169554"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="bg-white card-header py-3">
                            <h3 class="card-title fw-bold mb-0">Instagram</h3>
                            <div class="card-tools">
                                
                            </div>
                        </div>
                        <div class="card-body bg-white">
                            <iframe src="https://widgets.woxo.tech/f4dfe12b-8bf2-47f1-b4cb-43b07e0bf90b#mission-control-component-baf4e5d1-593c-4e0a-a869-349bc3b06442" title="Instagram widgets for the website" data-hj-allow-iframe="true" style="width: 100%; height: 100%; border: none; overflow: hidden; opacity: 100; transition: all 0.5s ease 0s;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-landing-layout>