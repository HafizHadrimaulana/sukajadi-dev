@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Kegiatan')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Detail <small>Surat Keputusan</small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Beranda</a></li>
                    <li class="breadcrumb-item active">Surat Keputusan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <div class="card" id="data-content">
        <div class="card-header">
            <div class="card-tools">
                <a href="{{ route('admin.agenda.surat-keputusan.edit', $data->id_t_surat) }}" class="btn btn-primary">
                    <i class="fa fa-edit mr-1"></i>
                    Ubah
                </a>
            </div>
        </div>
        
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-6">
                    <div class="row fs-6">
                        <div class="col-4 fw-bold">
                            Nomo Urut
                        </div>
                        <div class="col-8">
                            : {{ $data->nomor_urut_t_surat }}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row fs-6">
                        <div class="col-4 fw-bold">
                            Tanggal Diterima
                        </div>
                        <div class="col-8">
                            : {{ $data->tanggal_t_surat }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6">
                    <div class="row fs-6">
                        <div class="col-4 fw-bold">
                            Nomo Surat
                        </div>
                        <div class="col-8">
                            : {{ $data->no_t_surat }}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row fs-6">
                        <div class="col-4 fw-bold">
                            Tanggal Diterima
                        </div>
                        <div class="col-8">
                            : {{ $data->tanggal_surat_t_surat }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6">
                    <div class="row fs-6">
                        <div class="col-4 fw-bold">
                            Asal Surat
                        </div>
                        <div class="col-8">
                            : {{ $data->dari_kepada_t_surat }}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row fs-6">
                        <div class="col-4 fw-bold">
                            Perihal
                        </div>
                        <div class="col-8">
                            : {{ $data->perihal_t_surat }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row fs-6 mb-2">
                <div class="col-2 fw-bold">
                    Disposisi
                </div>
                <div class="col-8">
                    : {{ $data->disposisi_t_surat }}
                </div>
            </div>
            <div class="fw-bold">
                Isi / Deskripsi Surat
            </div>
            {!! $data->isi_t_surat !!}
        </div>
    </div>
</section>

@endsection

@push('scripts')
    <script>
        

        $(document).ready(function() {

        });
    </script>
@endpush