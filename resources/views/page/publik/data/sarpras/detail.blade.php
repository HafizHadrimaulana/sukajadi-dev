<x-landing-layout>

    @push('styles')
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>
    <link rel="stylesheet" href="https://unpkg.com/browse/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css"/>
    <link rel="stylesheet" href="https://unpkg.com/browse/leaflet.markercluster@1.4.1/dist/MarkerCluster.css"/>
    <style>
    
    .leaflet-container {
            height: 600px;
            width: 100%;
            max-width: 100%;
            max-height: 100%;
        }

    #data {
        height: 600px;
        position: relative;
        overflow: auto;
        padding: 0 10px;
    }
    </style>
    
    @endpush
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><span class="fw-bold">Sarana & Prasarana</span> <small>{{ $data->nama_j_data_sarpras }}</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('data.sarpras.index') }}">Sarana & Prasarana</a></li>
                        <li class="breadcrumb-item active">{{ $data->nama_j_data_sarpras}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content pb-md-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <input type="hidden" id="page" value="1"/>
                    <div id="data" data-spy="scroll" data-target="#data" data-offset="0" class="scrollspy-example">

                    </div>
                </div>
                <div class="col-md-8">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.3/leaflet.markercluster.js" integrity="sha512-OFs3W4DIZ5ZkrDhBFtsCP6JXtMEDGmhl0QPlmWYBJay40TT1n3gt2Xuw8Pf/iezgW9CdabjkNChRqozl/YADmg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js" integrity="sha512-Abr21JO2YqcJ03XGZRPuZSWKBhJpUAR6+2wH5zBeO4wAw4oksr8PRdF+BKIRsxvCdq+Mv4670rZ+dLnIyabbGw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var map;
        var tiles;
        var markers;
        var markersList = [];
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

                markers = new L.MarkerClusterGroup();
                load_content();

                var geoList;
                // $.getJSON('/js/geojson.json', function(json) {

                //     var geoLayer = L.geoJson(json).addTo(map);

                //     geoList = new L.Control.GeoJSONSelector(geoLayer, {
                //         zoomToLayer: true,
                //         listDisabled: true,
                //         activeListFromLayer: true,
                //         activeLayerFromList: true,
                //         listOnlyVisibleLayers: true
                //     }).addTo(map);

                //     geoList.on('selector:change', function(e) {

                //         var jsonObj = $.parseJSON( JSON.stringify(e.layers[0].feature.properties) );
                //         var html = 'Selection:<br /><table border="1">';
                //         $.each(jsonObj, function(key, value){
                //                 html += '<tr>';
                //                 html += '<td>' + key.replace(":", " ") + '</td>';
                //                 html += '<td>' + value + '</td>';
                //                 html += '</tr>';
                //         });
                //         html += '</table>';

                //         $('.selection').html(html);
                //     });

                //     map.addControl(function() {
                //         var c = new L.Control({position:'bottomright'});
                //         c.onAdd = function(map) {
                //                 return L.DomUtil.create('pre','selection');
                //             };
                //         return c;
                //     }());

                // });
                var geojsonLayer = new L.GeoJSON.AJAX("/js/geojson.json", {
                    style : function (feature){
                        // console.log(feature);
                        kel = feature.properties.id;
                        return {
                            fillColor: getColor(kel),
                            fillOpacity: 0.5,
                            color: "white",
                            dashArray: '3',
                            weight: 1,
                            opacity: 0.7
                        }
                    }
                }).addTo(map);

                geojsonLayer.bindPopup(function (e) {
                    return e.feature.properties.kemendagri_desa_nama;
                });
            });

            function getColor(d) {
                return d == 31245 ? '#F38484' :
                    d == 31246 ? '#D597F9' :
                    d == 31244 ? '#ACC715' :
                    d == 31243 ? '#EC9949' :
                    d == 31242 ? '#4C51EF' :
                    '#59FD02';
            }
            
            function load_content()
            {
                $.ajax({
                    url: "{{ route('data.sarpras.data', $data->id_j_data_sarpras) }}",
                    type: "GET",
                    dataType: "JSON",
                    data: {
                        daerah: $('#filter-daerah').val(),
                        keyword : $('#filter-keyword').val(),
                        page: $('#page').val(),
                    },
                    beforeSend: function(){
                        $('#loadingContent').removeClass('d-none');
                    },
                    success: function(response) {       
                        if(response.current_page == 1)
                        {
                            $('#data').html('');
                            $('#btn-loadMore').removeClass('d-none');
                        } 
                        if(response.data.length !== 0)
                        {
                            var i = 0;
                            $.each(response.data, function(k, v) {
                                var dt = response.data[k];
                                var lat = (dt.lat_t_data_sarpras != null) ? dt.lat_t_data_sarpras : '';
                                var lng = (dt.lng_t_data_sarpras != null) ? dt.lng_t_data_sarpras : ''
                                var elm = `<div class="card card-white shadow-sm collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">
                                            <i class="fa fa-map-marker mr-2"></i>
                                        `+ dt.nama_t_data_sarpras +`
                                        </h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse" onclick="getDetail(`+ dt.id_t_data_sarpras +`)">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                        <input type="hidden" id="lat-`+ dt.id_t_data_sarpras +`" value="`+ lat +`"/>
                                        <input type="hidden" id="lng-`+ dt.id_t_data_sarpras +`" value="`+ lng +`"/>
                                        <p class="mb-0">`+ dt.alamat_t_data_sarpras +`</p>
                                    </div>
                                </div>`;

                                $('#data').append(elm);

                                if(lat != '' && lng != ''){

                                    var elpopup = `<h3 class="fs-5 mb-2">${ dt.nama_t_data_sarpras }</h3>`;
                                    var popup = L.popup({
                                        className : 'popup-map'
                                    }).setContent(elpopup);
                                    var m = new L.Marker([parseFloat(lat), parseFloat(lng)],{
                                        title : dt.nama_t_data_sarpras,
                                    }).bindPopup(popup);
                                    markersList.push(m);
                                    markers.addLayer(m);
                                }
                            });
		                    map.addLayer(markers);
                        }else{
                            $('#btn-loadMore').addClass('d-none');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Error deleting data');
                    }
                });
            }

            function getDetail(id)
            {
                // console.log(data);
                var lat = $("#lat-"+id).val();
                var lng = $("#lng-"+id).val();
                if(lat == '' && lng == ''){
                    Swal.fire({
                        title: 'Error!',
                        text: 'Lokasi Koordinat Tidak Ditemukan',
                        icon: 'error',
                        toast : true,
                        position: "top-end",
                        showConfirmButton: false,
                    });
                }else{

                }
                console.log(lat);
                console.log(lng);
            }
        </script>
    @endpush
</x-landing-layout>