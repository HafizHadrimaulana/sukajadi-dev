@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Kegiatan')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Timeline <small>Kegiatan</small></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Beranda</a></li>
                    <li class="breadcrumb-item active">Timeline Kegiatan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

    <div class="card" id="data-content">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.timeline.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus mr-1"></i>
                    Tambah
                </a>

                <div class="space-x-1">
                    <button class="btn btn-info text-white">
                        <i class="fa fa-print"></i>
                        Export
                    </button>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <div class="timeline-gallery">
                @foreach ($data->foto as $f)
                    <a href="/storage{{ $f->nama_foto }}">
                        <img src="/storage{{ $f->nama_foto }}"/>
                    </a>
                @endforeach
            </div>
            <p>
                {!! $data->nama_kegiatan !!}
            </p>
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