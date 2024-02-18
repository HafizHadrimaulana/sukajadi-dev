@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Detail Pengajuan')
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
                    Detail Pegajuan
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Detail Pegajuan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card card-primary card-outline" id="data-content">
        <div class="card-header">
            <div class="card-tools">
                <button class="btn btn-primary" onclick="updateState('setuju')">
                    <i class="fa fa-check"></i>
                    Setuju
                </button>
                <button class="btn btn-danger" onclick="updateState('tolak')">
                    <i class="fa fa-times"></i>
                    Tolak
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="row fs-6">
                <div class="col-3 fw-bold">
                    Nama Pengaju
                </div>
                <div class="col-8">
                    : {{ $data->nama }}
                </div>
            </div>
            <div class="row fs-6">
                <div class="col-3 fw-bold">
                    Alamat Email
                </div>
                <div class="col-8">
                    : {{ $data->email }}
                </div>
            </div>
            <div class="row fs-6">
                <div class="col-3 fw-bold">
                    Jenis Permintaan Data
                </div>
                <div class="col-8">
                    : {{ $data->jenis }}
                </div>
            </div>
            <div class="row fs-6">
                <div class="col-3 fw-bold">
                    Tahun
                </div>
                <div class="col-8">
                    : {{ $data->nama_j_tahun }}
                </div>
            </div>
            <div class="row fs-6">
                <div class="col-3 fw-bold">
                    Status
                </div>
                <div class="col-8">
                    : {{ $data->status }}
                </div>
            </div>
            <div class="row fs-6">
                <div class="col-3 fw-bold">
                    Keterangan
                </div>
                <div class="col-8">
                    : {{ $data->keterangan }}
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script>
        

        $(document).ready(function() {
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

        function updateState(val){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ route('admin.kda.pengajuan.state', { $data->id }) }}",
                data: {
                    'status': val,
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
        }
    </script>
@endpush