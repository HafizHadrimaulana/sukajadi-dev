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
                <h1>Tambah Kegiatan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Kegiatan</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <form id="form-kegiatan" method="POST" action="{{ route('admin.kegiatan.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-tgl">Tanggal</label>
                            <input type="text" class="form-control bg-white {{ $errors->has('tgl') ? 'is-invalid' : '' }}" name="tgl" id="field-tgl" placeholder="Masukan Tanggal">
                            <x-input-error :messages="$errors->get('tgl')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-tgl">Jenis Kegiatan</label>
                            <select class="form-control select2 {{ $errors->has('jenis_kegiatan') ? 'is-invalid' : '' }}" name="jenis_kegiatan" id="field-jenis_kegiatan" data-placeholder="Pilih Tahun">
                                <option></option>
                                @foreach ($jenis as $t)
                                    <option value="{{ $t->id_j_kegiatan }}" {{ old('jenis_kegiatan') == $t->nama_j_kegiatan ? 'selected="selected"' : '' }}>{{ $t->nama_j_kegiatan }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('jenis_kegiatan')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-volume">Volume</label>
                            <input type="text" class="form-control {{ $errors->has('volume') ? 'is-invalid' : '' }}" name="volume" id="volume" placeholder="Masukan Volume">
                            <x-input-error :messages="$errors->get('volume')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-satuan">Satuan</label>
                            <select class="form-control select2 {{ $errors->has('satuan') ? 'is-invalid' : '' }}" name="satuan" id="field-satuan" data-placeholder="Pilih Satuan">
                                <option></option>
                                @foreach ($satuan as $t)
                                    <option value="{{ $t->id_j_satuan }}" {{ old('satuan') == $t->nama_j_satuan ? 'selected="selected"' : '' }}>{{ $t->nama_j_satuan }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('satuan')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-lokasi">Lokasi</label>
                    <input type="text" class="form-control {{ $errors->has('lokasi') ? 'is-invalid' : '' }}" name="lokasi" id="field-lokasi" placeholder="Masukan Lokasi / Alamat">
                    <x-input-error :messages="$errors->get('lokasi')" class="mt-2" />
                </div>
                <div class="form-group">
                    <label for="field-keterangan">Keterangan</label>
                    <textarea class="form-control" row="4" name="keterangan" id="field-keterangan" placeholder="Masukan Keterangan"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-foto1">Foto 0% <small class="text-danger">(.jpg|.png) Maks. 500 Kb</small></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto1" id="field-foto1">
                                    <label class="custom-file-label" for="foto1">Pilih</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-foto2">Foto 50% <small class="text-danger">(.jpg|.png) Maks. 500 Kb</small></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto2" id="field-foto2">
                                    <label class="custom-file-label" for="foto2">Pilih</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-foto3">Foto 100% <small class="text-danger">(.jpg|.png) Maks. 500 Kb</small></label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="foto3" id="field-foto3">
                                    <label class="custom-file-label" for="foto3">Pilih</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lat">Latitude</label>
                                    <input type="text" class="form-control" name="lat" id="lat" readonly placeholder="Latitude">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lng">Longtitude</label>
                                    <input type="text" class="form-control" name="lng" id="lng" readonly placeholder="Longtitude">
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
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
crossorigin=""></script>
<script src="https://unpkg.com/leaflet-geosearch@3.11.0/dist/geosearch.umd.js"></script>
    <script>
        // import { OpenStreetMapProvider } from 'leaflet-geosearch';
        // const provider = new OpenStreetMapProvider();
        // const provider = new GeoSearch.OpenStreetMapProvider();

        // const search = new GeoSearch.GeoSearchControl({
        //     provider: new GeoSearch.OpenStreetMapProvider(),
        // });
        $(document).ready(function() {
            // const provider = new GeoSearch.OpenStreetMapProvider();
            
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

            var map = L.map('map').setView([-6.885096440972612, 107.58568634441774], 14);
            var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZXJpcHJhdGFtYSIsImEiOiJjbGZubmdib3UwbnRxM3Bya3M1NGE4OHRsIn0.oxYqbBbaBwx0dHLguu5gOA', {
                maxZoom: 18,
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
            }).addTo(map);
            
            var marker = L.marker([-6.885096440972612, 107.58568634441774], {draggable:'true'})
            .addTo(map);

            if(!lat && !lng)
            {
                navigator.geolocation.getCurrentPosition(
                    function (position) {
                        $("#lat").val(position.coords.latitude);
                        $("#lng").val(position.coords.longitude);
                        map.panTo(new L.LatLng(parseFloat(position.coords.latitude), parseFloat(position.coords.longitude)));
                        marker.setLatLng(new L.LatLng(position.coords.latitude, position.coords.longitude),{draggable:'true'});
                        getAddress(parseFloat(position.coords.latitude), parseFloat(position.coords.longitude));
                    },
                    function errorCallback(error) {
                        console.log(error)
                    }
                );
            }else{
                map.panTo(new L.LatLng(parseFloat(lat), parseFloat(lng)));
                marker.setLatLng(new L.LatLng([parseFloat(lat), parseFloat(lng)], {draggable:'true'}));
            }

            marker.on('dragend', function(event){
                var marker = event.target;
                var position = marker.getLatLng();
                marker.setLatLng(new L.LatLng(position.lat, position.lng),{draggable:'true'});
                map.panTo(new L.LatLng(position.lat, position.lng));
                getAddress(position.lat, position.lng);
                $("#lat").val(position.lat);
                $("#lng").val(position.lng);
            });
            
            const provider = new GeoSearch.OpenStreetMapProvider({
                params: {
                    'accept-language': 'id', // render results in Dutch
                    countrycodes: 'id', // limit search results to the Netherlands
                },
            });

            console.log(provider);
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