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
    </script>
@endpush