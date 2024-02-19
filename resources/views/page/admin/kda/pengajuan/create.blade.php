@extends('layouts.base_admin.base_dashboard') 
@section('judul', 'Tambah Pengajuan')

@push('styles')

@endpush
@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Pengajuan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">KDA</a></li>
                    <li class="breadcrumb-item"><a href="#">Pengajuan</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="border-1 card rounded-2">
        <div class="card-body bg-white rounded-2">
            <form id="form-kegiatan" method="POST" action="{{ route('admin.kda.pengajuan.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-nama">Nama</label>
                            <input type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" name="nama" id="field-nama" placeholder="Masukan Nama">
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-email">Email</label>
                            <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="field-nama" placeholder="Masukan Email">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="field-jenis">Jenis</label>
                            <select class="form-control select2 {{ $errors->has('jenis') ? 'is-invalid' : '' }}" name="jenis" id="field-jenis" data-placeholder="Pilih Jenis">
                                <option></option>
                                <option value="Pegawai" {{ old('jenis') == 'Pegawai' ? 'selected="selected"' : '' }}>Pegawai</option>
                                <option value="Sarana & Prasarana" {{ old('jenis') == 'Sarana & Prasarana' ? 'selected="selected"' : '' }}>Sarana & Prasarana</option>
                                <option value="Usaha" {{ old('jenis') == 'Usaha' ? 'selected="selected"' : '' }}>Usaha</option>
                            </select>
                            <x-input-error :messages="$errors->get('jenis')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="field-tahun">Tahun</label>
                            <select class="form-control select2 {{ $errors->has('tahun') ? 'is-invalid' : '' }}" name="tahun" id="field-tahun" data-placeholder="Pilih tahun">
                                <option></option>
                                @foreach ($tahun as $t)
                                    <option value="{{ $t->id_j_tahun }}" {{ old('tahun') == $t->id_j_tahun ? 'selected="selected"' : '' }}>{{ $t->nama_j_tahun }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('tahun')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-keterangan">Keterangan</label>
                    <textarea class="form-control" row="4" name="keterangan" id="field-keterangan" placeholder="Masukan Keterangan"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    Simpan
                </button>
            </form>
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