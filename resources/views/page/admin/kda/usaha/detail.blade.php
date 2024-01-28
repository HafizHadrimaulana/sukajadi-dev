@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Usaha'. $data->nama_j_data_usaha)
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
                    <small>Data Usaha</small> {{ $data->nama_j_data_usaha }}
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Usaha</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card card-primary card-outline" id="data-content">
        <div class="card-header">
            <h3 class="card-title">
                Data Usaha {{ $data->nama_j_data_usaha }}
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered datatable w-100">
                <thead>
                    <tr>
                        <th>NAMA USAHA</th>
                        <th>PEMILIK</th>
                        <th>MERK</th>
                        <th>IZIN</th>
                        <th>NO. IZIN</th>
                        <th>TAHUN BERDIRI</th>
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
                    url : "{{ route('admin.usaha.show', $data->id_j_data_usaha) }}",
                    data : function(data){
                            var tahun = $("#filter-tahun").val();
                            data.tahun = tahun;
                    }
                },
                columns: [
                    {data: 'nama_t_data_usaha', name: 'nama_t_data_usaha'},
                    {data: 'alamat_t_data_usaha', name: 'alamat_t_data_usaha'},
                    {data: 'rt_t_data_usaha', name: 'rt_t_data_usaha'},
                    {data: 'rw_t_data_usaha', name: 'rw_t_data_usaha'},
                    {data: 'nama_j_sopd', name: 'nama_j_sopd'},
                    {data: 'keterangan_t_data_usaha', name: 'keterangan_t_data_usaha'},
                    {data: 'detail_t_data_usaha', name: 'detail_t_data_usaha'},
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