<x-landing-layout>
    
    @push('styles')
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    <link rel="stylesheet" href="https://unpkg.com/browse/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css"/>
    <link rel="stylesheet" href="https://unpkg.com/browse/leaflet.markercluster@1.4.1/dist/MarkerCluster.css"/>
    <style>
    
    .leaflet-container {
            height: 400px;
            width: 100%;
            max-width: 100%;
            max-height: 100%;
        }
    </style>
    
    @endpush
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
                            <span class="time"><i class="fas fa-clock"></i> {{ \Carbon\Carbon::parse($d->created_at)->translatedFormat('H:i') }} - {{ \Carbon\Carbon::parse($d->tanggal_kegiatan)->translatedFormat('jS F Y') }}</span>
                            <h3 class="timeline-header">
                                {{ $d->nama_j_sopd }}
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
                                <button class="btn btn-primary btn-sm btn-location" data-lat="{{ $d->lat_kegiatan }}" data-lng="{{ $d->lng_kegiatan }}">
                                    Lihat Lokasi
                                </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endforeach
                {{ $data->links() }}
            </div>
        </div>
    </section>
    <div class="modal fade" id="modal-map" tabindex="-1" aria-labelledby="modal-mapLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Lokasi Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.3/leaflet.markercluster.js" integrity="sha512-OFs3W4DIZ5ZkrDhBFtsCP6JXtMEDGmhl0QPlmWYBJay40TT1n3gt2Xuw8Pf/iezgW9CdabjkNChRqozl/YADmg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js" integrity="sha512-Abr21JO2YqcJ03XGZRPuZSWKBhJpUAR6+2wH5zBeO4wAw4oksr8PRdF+BKIRsxvCdq+Mv4670rZ+dLnIyabbGw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            var map, tiles, maker;
            $(document).ready(function() {
            map = L.map('map').setView([-6.885096440972612, 107.58568634441774], 14);
            tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZXJpcHJhdGFtYSIsImEiOiJjbGZubmdib3UwbnRxM3Bya3M1NGE4OHRsIn0.oxYqbBbaBwx0dHLguu5gOA', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(map);
                
           marker = L.marker([-6.885096440972612, 107.58568634441774], {draggable:'false'})
            .addTo(map);


            $(".btn-location").on("click", function(e){
                e.preventDefault();
                var lat = $(this).data('lat');
                var lng = $(this).data('lng');
                var newLatLng = new L.LatLng(lat, lng);
                marker.setLatLng(newLatLng); 
                map.setView(newLatLng, 14);
                map.panTo(newLatLng);

                $('#modal-map').modal('show');
            });

            $('#modal-map').on('shown.bs.modal', function() {
                map.invalidateSize();
            });

            $("button.close").on("click", function(e){
                $('#modal-map').modal('hide');
            });
        });



        </script>
    @endpush
</x-landing-layout>