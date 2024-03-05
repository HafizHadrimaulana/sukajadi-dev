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
                <h1>Ubah Sarana & Prasarana</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Sarana & Prasarana</a></li>
                    <li class="breadcrumb-item active">Ubah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <form id="form-kegiatan" method="POST" action="{{ route('admin.sarpras.update', $data->id_t_data_sarpras) }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-nama">Nama</label>
                            <input type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" name="nama" id="field-nama" placeholder="Masukan Nama"
                            value="{{ old('nama', $data->nama_t_data_sarpras) }}">
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-jenis">Jenis</label>
                            <select class="form-control select2 {{ $errors->has('jenis') ? 'is-invalid' : '' }}" name="jenis" id="field-jenis" data-placeholder="Pilih Jenis">
                                <option></option>
                                @foreach ($jenis as $t)
                                    <option value="{{ $t->id_j_data_sarpras }}" {{ old('jenis', $data->id_j_data_sarpras) == $t->id_j_data_sarpras ? 'selected="selected"' : '' }}>{{ $t->nama_j_data_sarpras }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('jenis')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-lokasi">Lokasi/Alamat</label>
                    <input type="text" class="form-control {{ $errors->has('lokasi') ? 'is-invalid' : '' }}" name="lokasi" id="field-lokasi" 
                    placeholder="Masukan Lokasi / Alamat" value="{{ old('lokasi', $data->alamat_t_data_sarpras) }}">
                    <x-input-error :messages="$errors->get('lokasi')" class="mt-2" />
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-kel">Kelurahan</label>
                            <select class="form-control select2 {{ $errors->has('kel') ? 'is-invalid' : '' }}" name="kel" id="field-kel" data-placeholder="Pilih Kelurahan">
                                <option></option>
                                @foreach ($kelurahan as $t)
                                    <option value="{{ $t->id_j_kelurahan }}" {{ old('kel', $data->kelurahan_t_data_sarpras) == $t->id_j_kelurahan ? 'selected="selected"' : '' }}>{{ $t->nama_j_kelurahan }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('kel')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="rt">RT</label>
                            <input type="text" class="form-control" name="rt" id="rt" placeholder="RT" value="{{ old('rt', $data->rt_t_data_sarpras) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="rw">RW</label>
                            <input type="text" class="form-control" name="rw" id="rw" placeholder="RW" value="{{ old('rw', $data->rw_t_data_sarpras) }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-keterangan">Keterangan</label>
                    <textarea class="form-control" row="4" name="keterangan" id="field-keterangan" placeholder="Masukan Keterangan">{{ old('keterangan', $data->keterangan_t_data_sarpras) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="field-detail">Detail</label>
                    <textarea class="form-control" row="4" name="detail" id="field-detail" placeholder="Masukan Detail">{{ old('detail', $data->detail_t_data_sarpras) }}</textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lat">Latitude</label>
                                    <input type="text" class="form-control" name="lat" id="lat" readonly placeholder="Latitude" value="{{ old('lat', $data->lat_t_data_sarpras) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lng">Longtitude</label>
                                    <input type="text" class="form-control" name="lng" id="lng" readonly placeholder="Longtitude" value="{{ old('lng', $data->lng_t_data_sarpras) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-alamat">Alamat Berdasarkan Titik</label>
                            <textarea class="form-control" row="4" name="alamat" id="field-alamat" readonly></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div id="map"></div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-geosearch@3.11.0/dist/geosearch.umd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"></script>
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

            var map = L.map('map').setView([-6.887827731261517, 107.59125658595599], 14);
            var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZXJpcHJhdGFtYSIsImEiOiJjbGZubmdib3UwbnRxM3Bya3M1NGE4OHRsIn0.oxYqbBbaBwx0dHLguu5gOA', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(map);

            var geojsonLayer = new L.GeoJSON.AJAX("/js/kecamatan.json", {
                style : function (feature){
                    kel = feature.properties.id;
                    return {
                        fillColor: '#e0a800',
                        fillOpacity: 0.5,
                        color: "white",
                        dashArray: '3',
                        weight: 1,
                        opacity: 0.7
                    }
                }
            }).addTo(map);
            
            var marker = L.marker([-6.887827731261517, 107.59125658595599], {draggable:'true'})
            .addTo(map);

            if(lat && lng)
            { 
                var latlng = new L.LatLng(lat, lng);
                map.panTo(latlng);
                marker.setLatLng(latlng);
            }

            marker.on('dragend', function(event){
                var marker = event.target;
                var position = marker.getLatLng();
                if (!geojsonLayer.getBounds().contains(position)) {
                    Swal.fire({
                        icon : 'error',
                        text: 'Titik Koordinat Hanya Boleh Di Wilayah Kecamatan Sukajadi?',
                        showCancelButton: false,
                        showConfirmButton : false,
                    });

                    map.panTo(new L.LatLng(-6.887827731261517, 107.59125658595599));
                    marker.setLatLng(new L.LatLng(-6.887827731261517, 107.59125658595599),{draggable:'true'});
                    getAddress(-6.887827731261517, 107.59125658595599);
                }else{
                    // alert('sa');
                    marker.setLatLng(new L.LatLng(position.lat, position.lng),{draggable:'true'});
                    map.panTo(new L.LatLng(position.lat, position.lng));
                    getAddress(position.lat, position.lng);
                    $("#lat").val(position.lat);
                    $("#lng").val(position.lng);
                }
            });
            
            const provider = new GeoSearch.OpenStreetMapProvider({
                params: {
                    'accept-language': 'id', // render results in Dutch
                    countrycodes: 'id', // limit search results to the Netherlands
                },
            });

            map.addControl(
                new GeoSearch.GeoSearchControl({
                    position: 'topright',
                    provider: provider,
                    style: 'bar',
                    // marker: marker
                    // keepResult: true,
                    // autoClose: true
                }),
            );

            map.on('geosearch/showlocation', () => {
                // if (marker) {
                //     map.removeControl(marker);
                // }
                
                map.eachLayer(item => {
                    if (item instanceof L.Marker) {
                        // console.log(item.getLatLng());
                        item.options.draggable = true;
                        item.options.autoPan = true;
                        item.dragging.enable();
                        var position = item.getLatLng();
                        getAddress(position.lat, position.lng);
                        $("#lat").val(position.lat);
                        $("#lng").val(position.lng);

                        item.on('dragend', function(event){
                            var m2 = event.target;
                            var p2 = m2.getLatLng();
                            getAddress(p2.lat, p2.lng);
                            $("#lat").val(p2.lat);
                            $("#lng").val(p2.lng);
                        });
                    }
                });
            });
            // const results = await provider.search({ query: input.value });

            // const coord = [38.748666, -9.103002] 

            

        });

        function getAddress(lat, lng){
            fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`, {
            headers: {
                'User-Agent': 'ID of your APP/service/website/etc. v0.1',
                'accept-language' : 'id',
            }
            }).then(res => res.json())
            .then(res => {
                // console.log(res.display_name)
                // console.log(res.address)
                $("#field-alamat").val(res.display_name);
            });
        }
    </script>
@endpush