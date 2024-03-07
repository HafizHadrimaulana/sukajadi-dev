@extends('layouts.base_admin.base_dashboard')
@section('judul', 'PKL')
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
                    <small>Data PKL</small> {{ $data->nama_j_data_pkl }}
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">PKL</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card card-primary card-outline" id="data-content">
        <div class="card-header">
            <h3 class="card-title">
                Data PKL {{ $data->nama_j_data_pkl }}
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered datatable w-100">
                <thead>
                    <tr>
                        <th>NAMA PEMILIK</th>
                        <th>NIK</th>
                        <th>NAMA PKL</th>
                        <th>MERK</th>
                        <th>IZIN</th>
                        <th>NO. IZIN</th>
                        <th>TAHUN BERDIRI</th>
                        <th>ALAMAT</th>
                        <th>RT</th>
                        <th>RW</th>
                        <th>KELURAHAN</th>
                        <th>EMAIL</th>
                        <th>SOSMED</th>
                        <th>TELP</th>
                        <th>JENIS</th>
                        <th>PRODUK</th>
                        <th>KETERANGAN</th>
                        <th>FOTO 1</th>
                        <th>FOTO 2</th>
                        <th>FOTO 3</th>
                        <th>FOTO 4</th>
                        <th>FOTO 5</th>
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
                    url : "{{ route('admin.data.pkl.show', $data->id_j_data_pkl) }}",
                    data : function(data){
                            var tahun = $("#filter-tahun").val();
                            data.tahun = tahun;
                    }
                },
                scrollX:        true,
                scrollCollapse: true,
                columns: [
                    {data: 'pemilik_t_data_pkl', name: 'pemilik_t_data_pkl'},
                    {data: 'nik_t_data_pkl', name: 'nik_t_data_pkl'},
                    {data: 'nama_t_data_pkl', name: 'nama_t_data_pkl'},
                    {data: 'merk_t_data_pkl', name: 'merk_t_data_pkl'},
                    {data: 'izin_t_data_pkl', name: 'izin_t_data_pkl'},
                    {data: 'no_izin_t_data_pkl', name: 'no_izin_t_data_pkl'},
                    {data: 'tahun_berdiri_t_data_pkl', name: 'tahun_berdiri_t_data_pkl'},
                    {data: 'alamat_t_data_pkl', name: 'alamat_t_data_pkl'},
                    {data: 'rt_t_data_pkl', name: 'rt_t_data_pkl'},
                    {data: 'rw_t_data_pkl', name: 'rw_t_data_pkl'},
                    {data: 'nama_j_kelurahan', name: 'nama_j_kelurahan'},
                    {data: 'email_t_data_pkl', name: 'email_t_data_pkl'},
                    {data: 'sosmed_t_data_pkl', name: 'sosmed_t_data_pkl'},
                    {data: 'telp_t_data_pkl', name: 'telp_t_data_pkl'},
                    {data: 'jenis_t_data_pkl', name: 'jenis_t_data_pkl'},
                    {data: 'produk_t_data_pkl', name: 'produk_t_data_pkl'},
                    {data: 'keterangan_t_data_pkl', name: 'keterangan_t_data_pkl'},
                    {data: 'file1_t_data_pkl', name: 'file1_t_data_pkl'},
                    {data: 'file2_t_data_pkl', name: 'file2_t_data_pkl'},
                    {data: 'file3_t_data_pkl', name: 'file3_t_data_pkl'},
                    {data: 'file4_t_data_pkl', name: 'file4_t_data_pkl'},
                    {data: 'file5_t_data_pkl', name: 'file5_t_data_pkl'},
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