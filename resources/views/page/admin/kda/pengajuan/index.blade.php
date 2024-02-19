@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Usaha')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pengajuan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Pengajuan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <div class="card">
        <div class="card-header">
            <button class="btn btn-success" onclick="add_data_tabel()"><i class="fa fa-plus"></i> Tambah</button>
            <div class="card-tools">
                <button class="btn btn-success" onclick="add_data_tabel()"><i class="fa fa-print"></i> Export</button>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered datatable w-100">
                <thead>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama Pengaju</th>
                        <th>Alamat Email</th>
                        <th>Jenis Data</th>
                        <th>Tahun</th>
                        <th>Status</th>
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

            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                dom : "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                ajax: {
                    url : "{{ route('admin.kda.pengajuan.index') }}",
                    data : function(data){
                    }
                },
                columns: [
                    {data: 'nomor', name: 'nomor'},
                    {data: 'nama', name: 'nama'},
                    {data: 'email', name: 'email'},
                    {data: 'jenis', name: 'jenis'},
                    {data: 'nama_j_tahun', name: 'nama_j_tahun'},
                    {data: 'status', name: 'status'},
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
                $("#data-content").addClass('d-none');
                table.draw();
            });

        });
    </script>
@endpush