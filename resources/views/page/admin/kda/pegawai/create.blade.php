@extends('layouts.base_admin.base_dashboard') 
@section('judul', 'Tambah Pegawai')

@push('styles')

@endpush
@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Pegawai</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Pegawai</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <form id="form-kegiatan" method="POST" action="{{ route('admin.kda.pegawai.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-jenis">Jenis</label>
                            <select class="form-control select2 {{ $errors->has('jenis') ? 'is-invalid' : '' }}" name="jenis" id="field-jenis" data-placeholder="Pilih Jenis">
                                <option></option>
                                @foreach ($jenis as $t)
                                    <option value="{{ $t->id_j_data_pegawai }}" {{ old('jenis') == $t->id_j_data_pegawai ? 'selected="selected"' : '' }}>{{ $t->nama_j_data_pegawai }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('jenis')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="field-nama">Nama</label>
                            <input type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" name="nama" id="field-nama" placeholder="Masukan Nama">
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-pangkat">Pangkat</label>
                                    <input type="text" class="form-control {{ $errors->has('pangkat') ? 'is-invalid' : '' }}" name="pangkat" id="field-pangkat" placeholder="Masukan Pangkat">
                                    <x-input-error :messages="$errors->get('pangkat')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-gol">Golongan</label>
                                    <input type="text" class="form-control {{ $errors->has('gol') ? 'is-invalid' : '' }}" name="gol" id="field-gol" placeholder="_/_">
                                    <x-input-error :messages="$errors->get('gol')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-ttl">Tempat Tanggal Lahir</label>
                            <input type="text" class="form-control {{ $errors->has('ttl') ? 'is-invalid' : '' }}" name="ttl" id="field-ttl" placeholder="Masukan Tempat Tanggal Lahir">
                            <x-input-error :messages="$errors->get('ttl')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="field-email">Email</label>
                            <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="field-email" placeholder="Masukan Alamat Email">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="field-jabatan_lainnya">Jabatan Lainnya</label>
                            <input type="text" class="form-control {{ $errors->has('jabatan_lainnya') ? 'is-invalid' : '' }}" name="jabatan_lainnya" id="field-jabatan_lainnya" placeholder="Masukan Jabatan Lainnya">
                            <x-input-error :messages="$errors->get('jabatan_lainnya')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-nip">NIP</label>
                            <input type="text" class="form-control {{ $errors->has('nip') ? 'is-invalid' : '' }}" name="nip" id="field-nip" placeholder="Masukan NIP">
                            <x-input-error :messages="$errors->get('nip')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="field-jk">Jenis Kelamin</label>
                           <select class="form-control {{ $errors->has('jk') ? 'is-invalid' : '' }}" name="jk" id="field-jk">
                                <option value="Laki-laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                           </select>
                            <x-input-error :messages="$errors->get('jk')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="field-esselon">Esselon</label>
                            <input type="text" class="form-control {{ $errors->has('esselon') ? 'is-invalid' : '' }}" name="esselon" id="field-esselon" placeholder="Masukan Esselon">
                            <x-input-error :messages="$errors->get('esselon')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="field-pendidikan">Pendidikan</label>
                            <input type="text" class="form-control {{ $errors->has('pendidikan') ? 'is-invalid' : '' }}" name="pendidikan" id="field-pendidikan" placeholder="Masukan Tempat Tanggal Lahir">
                            <x-input-error :messages="$errors->get('pendidikan')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="field-jabatan">Jabatan</label>
                            <input type="text" class="form-control {{ $errors->has('jabatan') ? 'is-invalid' : '' }}" name="jabatan" id="field-jabatan" placeholder="Masukan Jabatan">
                            <x-input-error :messages="$errors->get('jabatan')" class="mt-2" />
                        </div>
                        
                        <div class="form-group">
                            <label for="field-sopd">SOPD</label>
                            <select class="form-control select2 {{ $errors->has('sopd') ? 'is-invalid' : '' }}" name="sopd" id="field-sopd" data-placeholder="Pilih SOPD">
                                <option></option>
                                @foreach ($sopd as $t)
                                    <option value="{{ $t->id_j_sopd }}" {{ old('sopd') == $t->id_j_sopd ? 'selected="selected"' : '' }}>{{ $t->nama_j_sopd }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('sopd')" class="mt-2" />
                        </div>
                    </div>
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