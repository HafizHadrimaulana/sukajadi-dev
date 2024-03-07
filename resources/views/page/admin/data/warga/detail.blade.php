@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Detail Warga')
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
                    <small>Detail Warga</small>
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item active">Warga</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card card-primary card-outline" id="data-content">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="row fs-6">
                        <div class="col-4 fw-bold">
                            NIK
                        </div>
                        <div class="col-8">
                            : {{ $data->nik }}
                        </div>
                    </div>
                    <div class="row fs-6">
                        <div class="col-4 fw-bold">
                            Nama Lengkap
                        </div>
                        <div class="col-8">
                            : {{ $data->nama }}
                        </div>
                    </div>
                    <div class="row fs-6">
                        <div class="col-4 fw-bold">
                            Email
                        </div>
                        <div class="col-8">
                            : {{ $data->email }}
                        </div>
                    </div>
                    <div class="row fs-6">
                        <div class="col-4 fw-bold">
                            No Handphone
                        </div>
                        <div class="col-8">
                            : {{ $data->hp }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row fs-6">
                        <div class="col-4 fw-bold">
                            Alamat Lengkap
                        </div>
                        <div class="col-8">
                            : {{ $data->alamat }}
                        </div>
                    </div>
                    <div class="row fs-6">
                        <div class="col-4 fw-bold">
                            RT / RW
                        </div>
                        <div class="col-8">
                            : {{ $data->rt }} / {{ $data->rw}}
                        </div>
                    </div>
                    <div class="row fs-6">
                        <div class="col-4 fw-bold">
                            Kelurahan
                        </div>
                        <div class="col-8">
                            : {{ $data->kelurahan }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
@endpush