@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Kegiatan')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kegiatan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Kegiatan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <form id="form-filter" class="form-horizontal">
                <div class="row">
                    <div class="col-sm-2">
                        <x-tahun-select type="id" name="tahun" id="filter-tahun" value="{{ request()->get('tahun') }}"></x-tahun-select>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-sm-2">
                        <select class="form-control select2" name="bulan" id="filter-bulan" data-placeholder="Pilih Bulan">
                            <option></option>
                        </select>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-sm-3">
                        <x-sopd-select name="sopd"></x-sopd-select>
                        <span class="help-block"></span>
                    </div>
                    <div class="col-sm-4"> 
                        <button type="button" id="btn-filter" class="btn btn-primary">Proses</button>
                        <button type="button" id="btn-reset" class="btn btn-outline-danger">Reset</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="card card-primary card-outline d-none" id="data-content">
        @role(['superadmin', 'admin'])
        <div class="card-header">
            <div class="d-flex">
                <div class="space-x">
                    <a href="{{ route('admin.kegiatan.create') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus me-2"></i>
                        Tambah Kegiatan
                    </a>
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
                        <th>VOLUME</th>
                        <th>SATUAN</th>
                        <th>LOKASI</th>
                        <th>KETERANGAN</th>
                        <th>FOTO 0%</th>
                        <th>FOTO 50%</th>
                        <th>FOTO 100%</th>
                        {{-- <th>SOPD</th> --}}
                        <th width="60px"></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script>
        

        $(document).ready(function() {
            
            var tahun = $("#filter-tahun").val();
            if(tahun){
                $('#filter-bulan').prop("disabled", false);
                $('#filter-bulan').select2({
                    ajax: {
                        url: "{{ route('json.bulan') }}" +'?tahun='+tahun,
                        dataType: 'json',
                        processResults: function (data) {
                            return {
                                results: data
                            };
                        }
                    }
                });
            }else{
                $('#filter-bulan').prop("disabled", true);
            }

            $("#filter-tahun").on("change", function(e){
                var tahun = $(this).val();
                if(tahun){
                    $('#filter-bulan').removeAttr("disabled");

                    $('#filter-bulan').select2({
                        ajax: {
                            url: "{{ route('json.bulan') }}" +'?tahun='+tahun,
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
                dom : "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                ajax: {
                    url : "{{ route('admin.kegiatan.index') }}",
                    data : function(data){
                            var tahun = $("#filter-tahun").val();
                            var bulan = $("#filter-bulan").val();
                            var sopd = $("#filter-sopd").val();
                            data.tahun = tahun;
                            data.bulan = bulan;
                            data.sopd = sopd;
                    }
                },
                columns: [
                    {data: 'tanggal_t_kegiatan', name: 'tanggal_t_kegiatan'},
                    {data: 'nama_j_kegiatan', name: 'nama_j_kegiatan'},
                    {data: 'volume_t_kegiatan', name: 'volume_t_kegiatan'},
                    {data: 'nama_j_satuan', name: 'nama_j_satuan'},
                    {data: 'lokasi_t_kegiatan', name: 'lokasi_t_kegiatan'},
                    {data: 'keterangan_t_kegiatan', name: 'keterangan_t_kegiatan'},
                    {data: 'foto_awal_t_kegiatan', name: 'foto_awal_t_kegiatan'},
                    {data: 'foto_proses_t_kegiatan', name: 'foto_proses_t_kegiatan'},
                    {data: 'foto_akhir_t_kegiatan', name: 'foto_akhir_t_kegiatan'},
                    // {data: 'nama_j_sopd', name: 'nama_j_sopd'},
                    {
                        data: 'action', 
                        name: 'action', 
                        orderable: true, 
                        searchable: true
                    },
                ]
            });

            if(tahun != ''){
                table.draw();
            }

            $("#btn-filter").on("click", function(e){ 
                // alert('sasa');
                $("#data-content").removeClass('d-none');
                table.draw();
            });
            

            $("#btn-reset").on("click", function(e){ 
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
                            url: "/admin/kegiatan/"+id+"/delete",
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