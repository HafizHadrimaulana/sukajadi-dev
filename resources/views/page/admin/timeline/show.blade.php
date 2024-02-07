@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Kegiatan')
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
                <h1>Timeline <small>Kegiatan</small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Beranda</a></li>
                    <li class="breadcrumb-item active">Timeline Kegiatan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <div class="card card-primary card-outline" id="data-content">
        <div class="card-header">
            {{ $data->nama_j_kegiatan }}
            <div class="card-tools">
                <a class="btn btn-info text-white" href="">
                    <i class="fa fa-edit"></i>
                    Ubah
                </a>
            </div>
        </div>
        
        <div class="card-body">
            <div class="timeline-gallery">
                @foreach ($data->foto as $f)
                    <a href="/storage{{ $f->nama_foto }}">
                        <img src="/storage{{ $f->nama_foto }}"/>
                    </a>
                @endforeach
            </div>
            {!! $data->nama_kegiatan !!}
            
            <div id="map" class="mt-3"></div>
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

            var map = L.map('map').setView(['{{ $data->lat_kegiatan }}', '{{ $data->lng_kegiatan }}'], 14);
            var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZXJpcHJhdGFtYSIsImEiOiJjbGZubmdib3UwbnRxM3Bya3M1NGE4OHRsIn0.oxYqbBbaBwx0dHLguu5gOA', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(map);
            
            var marker = L.marker(['{{ $data->lat_kegiatan }}', '{{ $data->lng_kegiatan }}'], {draggable:'false'})
            .addTo(map);

            getAddress('{{ $data->lat_kegiatan }}', '{{ $data->lng_kegiatan }}');
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