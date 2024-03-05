@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Medsos')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
                    <i class="fa fa-arrow-left"></i>
                    </a>
                    <small>Data Pegawai</small> {{ $data->nama_j_data_pegawai }}
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pegawai</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card card-primary card-outline" id="data-content">
        <div class="card-header">
            <h3 class="card-title">
                Data Pegawai {{ $data->nama_j_data_pegawai }}
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered datatable w-100">
                <thead>
                    <tr>
                        <th width="20%">Nama Pegawai</th>
                        <th>NIP</th>
                        <th>TEMPAT TANGGAL LAHIR</th>
                        <th>JABATAN</th>
                        <th>SOPD</th>
                        <th>PANGKAT</th>
                        <th>GOLONGAN</th>
                        <th>ESSELON</th>
                        <th>JENIS KELAMIN</th>
                        <th>PENDIDIKAN</th>
                        <th>EMAIL</th>
                        <th>TELEPON</th>
                        <th>JABATAN LAINNYA</th>
                        <th>ESSELON</th>
                        <th></th>
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
    <script src="https://cdn.datatables.net/fixedcolumns/3.3.2/js/dataTables.fixedColumns.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                dom : "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                ajax: {
                    url : "{{ route('admin.pegawai.show', $data->id_j_data_pegawai) }}",
                    data : function(data){
                            var tahun = $("#filter-tahun").val();
                            data.tahun = tahun;
                    }
                },
                scrollX:        true,
                scrollCollapse: true,
                fixedColumns: {leftColumns:4,rightColumns:1},
                columns: [
                    {data: 'nama_t_data_pegawai', name: 'nama_t_data_pegawai'},
                    {data: 'nip_t_data_pegawai', name: 'nip_t_data_pegawai'},
                    {data: 'ttl_t_data_pegawai', name: 'ttl_t_data_pegawai'},
                    {data: 'jabatan_t_data_pegawai', name: 'jabatan_t_data_pegawai'},
                    {data: 'nama_j_sopd', name: 'nama_j_sopd'},
                    {data: 'pangkat_t_data_pegawai', name: 'pangkat_t_data_pegawai'},
                    {data: 'gol_t_data_pegawai', name: 'gol_t_data_pegawai'},
                    {data: 'esselon_t_data_pegawai', name: 'esselon_t_data_pegawai'},
                    {data: 'gender_t_data_pegawai', name: 'gender_t_data_pegawai'},
                    {data: 'pendidikan_t_data_pegawai', name: 'pendidikan_t_data_pegawai'},
                    {data: 'email_t_data_pegawai', name: 'email_t_data_pegawai'},
                    {data: 'telp_t_data_pegawai', name: 'telp_t_data_pegawai'},
                    {data: 'jabatan_lainnya_t_data_pegawai', name: 'jabatan_lainnya_t_data_pegawai'},
                    {
                        data: 'action', 
                        name: 'action', 
                        orderable: true, 
                        searchable: true
                    },
                ]
            });

        });
    </script>
@endpush