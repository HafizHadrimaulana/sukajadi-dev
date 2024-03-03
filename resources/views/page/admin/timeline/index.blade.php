@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Kegiatan')
@section('content')
@push('styles')

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
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

    <div class="card" id="data-content">
        @role(['superadmin', 'admin', 'kelurahan'])
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.timeline.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus mr-1"></i>
                    Tambah
                </a>

                <div class="space-x-1">
                </div>
            </div>
        </div>
        @endrole
        
        <div class="card-body">
            <table class="table table-bordered datatable w-100">
                <thead>
                    <tr>
                        <th>TANGGAL</th>
                        <th>KEGIATAN</th>
                        <th>KETERANGAN</th>
                        <th>FOTO</th>
                        <th width="60px"></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
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
@endsection

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.5.3/leaflet.markercluster.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js"></script>
<script>
    $(document).ready(function () {
        var map = L.map('map').setView([-6.885096440972612, 107.58568634441774], 14);
        var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZXJpcHJhdGFtYSIsImEiOiJjbGZubmdib3UwbnRxM3Bya3M1NGE4OHRsIn0.oxYqbBbaBwx0dHLguu5gOA', {
            maxZoom: 18,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1
        }).addTo(map);
            
        var marker = L.marker([-6.885096440972612, 107.58568634441774], {draggable:'false'})
        .addTo(map);

        var tahun = $("#filter-tahun").val();
        if (tahun) {
            $('#filter-bulan').prop("disabled", false);

            $('#filter-bulan').select2({
                ajax: {
                    url: "{{ route('json.bulan') }}" + '?tahun=' + tahun,
                    dataType: 'json',
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    }
                }
            });
        } else {
            $('#filter-bulan').prop("disabled", true);
        }

        $("#filter-tahun").on("change", function (e) {
            var tahun = $(this).val();
            if (tahun) {
                $('#filter-bulan').removeAttr("disabled");

                $('#filter-bulan').select2({
                    ajax: {
                        url: "{{ route('json.bulan') }}" + '?tahun=' + tahun,
                        dataType: 'json',
                        processResults: function (data) {
                            return {
                                results: data
                            };
                        }
                    }
                });
            }

        });

        var table = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            ajax: {
                url: "{{ route('admin.timeline.index') }}",
                data: function (data) {
                    var tahun = $("#filter-tahun").val();
                    var bulan = $("#filter-bulan").val();
                    var sopd = $("#filter-sopd").val();
                    data.tahun = tahun;
                    data.bulan = bulan;
                    data.sopd = sopd;
                }
            },
            columns: [{
                    data: 'tanggal_kegiatan',
                    name: 'tanggal_kegiatan'
                },
                {
                    data: 'nama_j_kegiatan',
                    name: 'nama_j_kegiatan'
                },
                {
                    data: 'nama_kegiatan',
                    name: 'nama_kegiatan'
                },
                {
                    data: 'foto',
                    name: 'foto'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });


        $("#btn-filter").on("click", function (e) {
            // alert('sasa');
            $("#data-content").removeClass('d-none');
            table.draw();
        });


        $("#btn-reset").on("click", function (e) {
            // alert('sasa');
            $("#filter-tahun").val("");
            $('#filter-tahun').trigger('change');
            $("#filter-bulan").val("");
            $('#filter-bulan').trigger('change');
            $("#filter-sopd").val("");
            $('#filter-sopd').trigger('change');
            $("#data-content").addClass('d-none');
            table.draw();
        });

        $('.img-preview').magnificPopup({
            type: 'image',
        });

        $("a.open-map").on("click", function(e){
            alert('saas');
        });
        $(document).on('click', '.open-map', function(){
            var lat = $(this).data('lat');
            var lng = $(this).data('lng');

            var newLatLng = new L.LatLng(lat, lng);
            map.setView(newLatLng, 14);
            map.panTo(newLatLng);
            marker.setLatLng(newLatLng);

            $('#modal-map').modal('show');
        });
        $("button.close").on("click", function(e){
            $('#modal-map').modal('hide');
        }); 
        // function openMap(lat, lng){
        //     // var lat = $(this).data('lat');
        //     // var lng = $(this).data('lng');

        //     var newLatLng = new L.LatLng(lat, lng);
        //     map.setView(newLatLng, 14);
        //     marker.setLatLng(newLatLng);

        //     $('#modal-map').modal('show');
        // }
    });
        
        function hapus(id)
        {
            Swal.fire({
                icon : 'warning',
                text: 'Hapus Data?',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: `Tidak, Jangan!`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "/admin/timeline/"+id+"/delete",
                        type: "DELETE",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        success: function(data) {
                            if(data.fail == false){
                                Swal.fire({
                                    toast : true,
                                    title: "Berhasil",
                                    text: "Data Berhasil Dihapus!",
                                    timer: 1500,
                                    showConfirmButton: false,
                                    icon: 'success',
                                    position : 'top-end'
                                }).then((result) => {
                                    location.reload();
                                });
                            }else{
                                Swal.fire({
                                    toast : true,
                                    title: "Gagal",
                                    text: "Data Gagal Dihapus!",
                                    timer: 1500,
                                    showConfirmButton: false,
                                    icon: 'error',
                                    position : 'top-end'
                                });
                            }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                                Swal.fire({
                                    toast : true,
                                    title: "Gagal",
                                    text: "Terjadi Kesalahan Di Server!",
                                    timer: 1500,
                                    showConfirmButton: false,
                                    icon: 'error',
                                    position : 'top-end'
                                });
                        }
                    });
                }
            })
        }
</script>
@endpush