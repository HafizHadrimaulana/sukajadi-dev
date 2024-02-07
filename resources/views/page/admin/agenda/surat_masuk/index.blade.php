@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Kegiatan')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Surat Masuk</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Surat Masuk</li>
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
                        <x-tahun-select type="id" value="{{ request()->get('tahun') }}"></x-tahun-select>
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

    <div class="card d-none" id="data-content">
        <div class="card-header">
            <div class="d-flex">
                <div class="space-x">
                    <a href="{{ route('admin.agenda.surat-masuk.create') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus me-2"></i>
                        Tambah Surat Masuk
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered datatable w-100">
                <thead>
                    <tr>
                        <th>NOMOR</th>
                        <th>TGL DITERIMA</th>
                        <th>TGL SURAT</th>
                        <th>NOMOR SURAT</th>
                        <th>ASAL SURAT</th>
                        <th>PERIHAL SURAT</th>
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
                    url : "{{ route('admin.agenda.surat-masuk.index') }}",
                    data : function(data){
                            var tahun = $("#filter-tahun").val();
                            data.tahun = tahun;
                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'tanggal_t_surat', name: 'tanggal_t_surat'},
                    {data: 'tanggal_surat_t_surat', name: 'tanggal_surat_t_surat'},
                    {data: 'no_t_surat', name: 'no_t_surat'},
                    {data: 'dari_kepada_t_surat', name: 'dari_kepada_t_surat'},
                    {data: 'perihal_t_surat', name: 'perihal_t_surat'},
                    {
                        data: 'action', 
                        name: 'action', 
                        orderable: true, 
                        searchable: true
                    },
                ]
            });
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
    </script>
@endpush