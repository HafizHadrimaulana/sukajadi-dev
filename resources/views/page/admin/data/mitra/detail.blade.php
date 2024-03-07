@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Mitra')
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
                    <small>Data Mitra</small> {{ $data->nama_j_data_mitra }}
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Mitra</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card card-primary card-outline" id="data-content">
        <div class="card-header">
            <h3 class="card-title">
                Data Mitra {{ $data->nama_j_data_mitra }}
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered datatable w-100">
                <thead>
                    <tr>
                        <th>Nama Data</th>
                        <th>Jumlah Data</th>
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
                    url : "{{ route('admin.data.mitra.index') }}",
                    data : function(data){
                            var tahun = $("#filter-tahun").val();
                            data.tahun = tahun;
                    }
                },
                columns: [
                    {data: 'nama_j_data_mitra', name: 'nama_j_data_mitra'},
                    {data: 'jumlah', name: 'jumlah'},
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