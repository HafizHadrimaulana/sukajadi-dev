@extends('layouts.base_admin.base_dashboard') 
@section('judul', 'Ubah Kegiatan')

@push('styles')
    
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
crossorigin=""/>
<link
  rel="stylesheet"
  href="https://unpkg.com/leaflet-geosearch@3.11.0/dist/geosearch.css"
/>
<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css" crossorigin="anonymous">

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"><style>
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
                <h1>Ubah Kegiatan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Kegiatan</a></li>
                    <li class="breadcrumb-item active">Ubah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <form id="form-timeline" method="POST" action="{{ route('admin.timeline.update', $data->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input id="field-foto" name="foto[]" type="file" multiple>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-status">Status</label>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" name="status_kegiatan" id="field-status" checked="">
                                <label for="field-status" class="custom-control-label">Internal</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-sopd">SOPD</label>
                            <select class="form-control select2 {{ $errors->has('sopd') ? 'is-invalid' : '' }}" name="sopd" id="field-sopd" data-placeholder="Pilih SOPD">
                                <option></option>
                                @foreach ($sopd as $t)
                                    <option value="{{ $t->id_j_sopd }}" {{ old('sopd', $data->id_j_sopd) == $t->id_j_sopd ? 'selected="selected"' : '' }}>{{ $t->nama_j_sopd }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('sopd')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-tgl">Jenis Kegiatan</label>
                            <select class="form-control select2 {{ $errors->has('jenis_kegiatan') ? 'is-invalid' : '' }}" name="jenis_kegiatan" id="field-jenis_kegiatan" data-placeholder="Pilih Tahun">
                                <option></option>
                                @foreach ($jenis as $t)
                                    <option value="{{ $t->id_j_kegiatan }}" {{ old('jenis_kegiatan', $data->id_j_kegiatan) == $t->id_j_kegiatan ? 'selected="selected"' : '' }}>{{ $t->nama_j_kegiatan }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('jenis_kegiatan')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-keterangan">Keterangan</label>
                    <textarea class="form-control" row="4" name="keterangan" id="field-keterangan" placeholder="Masukan Keterangan">{{ old('keterangan', $data->nama_kegiatan) }}</textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lat">Latitude</label>
                                    <input type="text" class="form-control" name="lat" id="lat" readonly placeholder="Latitude" value="{{ old('lat', $data->lat_kegiatan) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lng">Longtitude</label>
                                    <input type="text" class="form-control" name="lng" id="lng" readonly placeholder="Longtitude"  value="{{ old('lng', $data->lng_kegiatan) }}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-alamat">Alamat Berdasarkan Titik</label>
                            <textarea class="form-control" row="4" name="alamat" id="field-alamat" readonly>{{ old('alamat', $data->lokasi_kegiatan) }}</textarea>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js" integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://unpkg.com/leaflet-geosearch@3.11.0/dist/geosearch.umd.js"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/buffer.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/filetype.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/piexif.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/sortable.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/locales/id.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"></script>
<script>
    // var initFoto = foto.split(",");
    // console.log(foto);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            var initFoto = JSON.parse('{!! $data->fotoArray !!}');
            console.log(initFoto);
            
            $('#field-keterangan').summernote({
                height: 300,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ],
            });

            $("#field-foto").fileinput({
                showCancel: false,
                showUpload:false,
                showRemove:false,
                uploadAsync: false,
                minFileCount: 2,
                maxFileCount: 5,
                overwriteInitial: false,
                initialPreview: initFoto,
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreviewConfig : JSON.parse('{!! $data->fotoData !!}'),
            });

            $("#field-tgl").flatpickr({
                altInput: true,
                altFormat: "j F Y",
                dateFormat: "Y-m-d",
                locale : "id",
                defaultDate : new Date(),
            });


            var lat =$('#lat').val();
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
            
            var marker = L.marker([-6.885096440972612, 107.58568634441774],{draggable:'true'})
            .addTo(map);

            if(lat && lng)
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