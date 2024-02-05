@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Mitra')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pegawai</h1>
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

    <div class="card">
        <div class="card-header">
            <button class="btn btn-success" onclick="add_data_tabel()"><i class="fa fa-plus"></i> Tambah</button>
            
            <div class="card-tools">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-file-excel me-1"></i>
                    Export
                </button>
            </div>
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
<div class="modal fade" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Export Excel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
                <form method="GET" target="_blank" action="{{ route('admin.kda.pegawai.export') }}">
                <div class="form-group">
                    <label for="field-jenis" class="d-block">Jenis</label>
                    <select class="form-control select2 w-100 {{ $errors->has('jenis') ? 'is-invalid' : '' }}" name="jenis" id="field-jenis" data-placeholder="Pilih Jenis">
                        <option value="semua">Semua</option>
                        @foreach ($jenis as $t)
                            <option value="{{ $t->id_j_data_pegawai }}" {{ old('jenis') == $t->id_j_data_pegawai ? 'selected="selected"' : '' }}>{{ $t->nama_j_data_pegawai }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('jenis')" class="mt-2" />
                </div>
                <div class="float-right">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Download</button>
                </div>
            </form>
        </div>
    </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        

        $(document).ready(function() {

            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                dom : "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                ajax: {
                    url : "{{ route('admin.kda.pegawai.index') }}",
                    data : function(data){
                            var tahun = $("#filter-tahun").val();
                            data.tahun = tahun;
                    }
                },
                columns: [
                    {data: 'nama_j_data_pegawai', name: 'nama_j_data_pegawai'},
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