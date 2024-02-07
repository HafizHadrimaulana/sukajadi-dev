@extends('layouts.base_admin.base_dashboard') 
@section('judul', 'Tambah Kegiatan')

@push('styles')
    
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
crossorigin=""/>
<link
  rel="stylesheet"
  href="https://unpkg.com/leaflet-geosearch@3.11.0/dist/geosearch.css"
/>
<style>

.leaflet-container {
        height: 400px;
        width: 100%;
        max-width: 100%;
        max-height: 100%;
    }
</style>

@endpush
@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail Kegiatan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Kegiatan</a></li>
                    <li class="breadcrumb-item active">Detail</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-6">
                    <div class="row fs-6">
                        <div class="col-4 fw-bold">
                            Tanggal
                        </div>
                        <div class="col-8">
                            : {{ $data->tanggal_t_kegiatan }}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row fs-6">
                        <div class="col-4 fw-bold">
                            Jenis
                        </div>
                        <div class="col-8">
                            : {{ $data->nama_j_kegiatan }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6">
                    <div class="row fs-6">
                        <div class="col-4 fw-bold">
                            Volume
                        </div>
                        <div class="col-8">
                            : {{ $data->volume_t_kegiatan }}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row fs-6">
                        <div class="col-4 fw-bold">
                            Satuan
                        </div>
                        <div class="col-8">
                            : {{ $data->nama_j_satuan }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6">
                    <div class="row fs-6">
                        <div class="col-4 fw-bold">
                            Latitude
                        </div>
                        <div class="col-8">
                            : {{ $data->lat_t_kegiatan }}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row fs-6">
                        <div class="col-4 fw-bold">
                            Longtitude
                        </div>
                        <div class="col-8">
                            : {{ $data->lng_t_kegiatan }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row fs-6 mb-2">
                <div class="col-2 fw-bold">
                    Lokasi
                </div>
                <div class="col-8">
                    : {{ $data->lokasi_t_kegiatan }}
                </div>
            </div>
            <div class="row fs-6 mb-2">
                <div class="col-2 fw-bold">
                    Alamat Lengkap <small>Berdasarkan Koordinat</small>
                </div>
                <div class="col-8" id="alamat_koordinat">
                    : {{ $data->lokasi_t_kegiatan }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-foto1">Foto 0% <small class="text-danger">(.jpg|.png) Maks. 500 Kb</small></label>
                        <img src="{{ $data->foto_awal_t_kegiatan }}" class="img-fluid"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-foto2">Foto 50% <small class="text-danger">(.jpg|.png) Maks. 500 Kb</small></label>
                        <img src="{{ $data->foto_proses_t_kegiatan }}" class="img-fluid"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-foto3">Foto 100% <small class="text-danger">(.jpg|.png) Maks. 500 Kb</small></label>
                        <img src="{{ $data->foto_akhir_t_kegiatan }}" class="img-fluid"/>
                    </div>
                </div>
            </div>
            <div id="map"></div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>
<script src="https://unpkg.com/leaflet-geosearch@3.11.0/dist/geosearch.umd.js"></script>
    <script>
        $(document).ready(function() {
            $("#field-tgl").flatpickr({
                altInput: true,
                altFormat: "j F Y",
                dateFormat: "Y-m-d",
                locale : "id",
                defaultDate : new Date(),
            });


            var lat = $('#lat').val();
            var lng = $('#lng').val();
            // alert(lat);

            var map = L.map('map').setView(['{{ $data->lat_t_kegiatan }}', '{{ $data->lng_t_kegiatan }}'], 14);
            var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZXJpcHJhdGFtYSIsImEiOiJjbGZubmdib3UwbnRxM3Bya3M1NGE4OHRsIn0.oxYqbBbaBwx0dHLguu5gOA', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(map);
            
            var marker = L.marker(['{{ $data->lat_t_kegiatan }}', '{{ $data->lng_t_kegiatan }}'], {draggable:'false'})
            .addTo(map);

            getAddress('{{ $data->lat_t_kegiatan }}', '{{ $data->lng_t_kegiatan }}');
        });

        function getAddress(lat, lng){
            fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`, {
            headers: {
                'User-Agent': 'ID of your APP/service/website/etc. v0.1',
                'accept-language' : 'id',
            }
            }).then(res => res.json())
            .then(res => {
                $("#alamat_koordinat").html(': '+ res.display_name);
            });
        }
    </script>
@endpush