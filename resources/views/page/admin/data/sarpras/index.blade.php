@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Sarana Prasana')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Sarana & Prasarana</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Sarana & Prasarana</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <div class="card card-primary card-outline">
        @role(['superadmin', 'admin'])
        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('admin.data.sarpras.create') }}">
                <i class="fa fa-plus"></i>
                 Tambah Sarana & Prasarana
            </a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-j_sarpras">
                <i class="fa fa-plus"></i>
                 Tambah Jenis Sarana & Prasarana
            </button>
        </div>
        @endrole
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
<div class="modal fade" id="modal-j_sarpras" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="modal-form">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Jenis Sarana & Prasarana</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="field-nama">Nama</label>
                        <input name="hp" type="text" placeholder="Masukan Nama Jenis Sarana & Prasarana" class="form-control" id="field-nama">
                        <div id="error-nama" class="invalid-feedback"></div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
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
                    url : "{{ route('admin.data.sarpras.index') }}",
                    data : function(data){
                            var tahun = $("#filter-tahun").val();
                            data.tahun = tahun;
                    }
                },
                columns: [
                    {data: 'nama_j_data_sarpras', name: 'nama_j_data_sarpras'},
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

            
            $("#modal-form").on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: "{{ route('admin.data.sarpras.jenis.create') }}",
                    data: {
                        'nama': $('#field-nama').val(),
                    },
                    cache: false,
                    success: function (response) {
                        const data = response.data;
                        if(response.fail == true){
                            for (control in response.errors) {
                                $('#field-' + control).addClass('is-invalid');
                                $('#error-' + control).html(response.errors[control]);
                            }
                        }else{
                            $("#field-nama").val("");
                            $('#modal-j_sarpras').modal('hide');
                            table.draw();
                        }
                    }
                });
            });

        });
    </script>
@endpush