<x-landing-layout>
    <section class="content pb-md-4 pt-md-4">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="fw-bold">Laporan Kegiatan</h1>
                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-md-5">
                            <x-sopd-select ></x-sopd-select>
                        </div>
                        <div class="col-md-5">
                            <input type="text" class="form-control bg-white" id="filter-tgl"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="timeline">
                @foreach($data as $date => $timelines)
                <div class="time-label">
                    <span class="bg-red">{{ \Carbon\Carbon::parse($date)->translatedFormat('l, jS F, Y') }}</span>
                </div>
                    @foreach($timelines as $d)
                    <div>
                        <i class="fab fa-whatsapp bg-success"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fas fa-clock"></i> {{ \Carbon\Carbon::parse($d->jam_kegiatan)->translatedFormat('H:i') }} - {{ \Carbon\Carbon::parse($d->tanggal_kegiatan)->translatedFormat('jS F Y') }}</span>
                            <h3 class="timeline-header">
                                Kecamatan Sukajadi
                            </h3>
                            <div class="timeline-body">
                                <div class="timeline-gallery">
                                    @foreach ($d->foto as $f)
                                        <a href="/storage{{ $f->nama_foto }}">
                                            <img src="/storage{{ $f->nama_foto }}"/>
                                        </a>
                                    @endforeach
                                </div>
                                {!! $d->nama_kegiatan !!}
                            </div>
                            <div class="timeline-footer">
                                <a class="btn btn-primary btn-sm" target="_blank" href="https://www.google.com/maps/dir/?api=1&destination={{ $d->lat_kegiatan }},{{ $d->lng_kegiatan}}">
                                    Lihat Lokasi
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endforeach

            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            function openMap(lat, lng){
                console.log('Lihat Map');
                console.log(lat);
                console.log(lng);
            }

        </script>
    @endpush
</x-landing-layout>