@extends('layouts.base_admin.base_dashboard') 
@section('judul', 'Tambah Usaha')

@push('styles')
    
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
crossorigin=""/>
<link
  rel="stylesheet"
  href="https://unpkg.com/leaflet-geosearch@3.11.0/dist/geosearch.css"
/>
<style>

.leaflet-container {
        height: 400px;
        width: 100%;
        max-width: 100%;
        max-height: 100%;
    }
</style>

@endpush
@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Tambah Usaha</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Usaha</a></li>
                    <li class="breadcrumb-item active">Tambah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="card">
        <div class="card-body">
            <form id="form-kegiatan" method="POST" action="{{ route('admin.kda.usaha.update', $data->id_t_data_usaha) }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-jenis">Jenis</label>
                            <select class="form-control select2 {{ $errors->has('jenis') ? 'is-invalid' : '' }}" name="jenis" id="field-jenis" data-placeholder="Pilih Jenis">
                                <option></option>
                                @foreach ($jenis as $t)
                                    <option value="{{ $t->id_j_data_usaha }}" {{ old('jenis', $data->id_j_data_usaha) == $t->id_j_data_usaha ? 'selected="selected"' : '' }}>{{ $t->nama_j_data_usaha }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('jenis')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="field-nama_pemilik">Nama Pemilik</label>
                            <input type="text" class="form-control {{ $errors->has('nama_pemilik') ? 'is-invalid' : '' }}" value="{{ old('nama', $data->pemilik_t_data_usaha) }}" name="nama_pemilik" id="field-nama_pemilik" placeholder="Masukan Nama Pemilik">
                            <x-input-error :messages="$errors->get('nama_pemilik')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="field-merk">Merk/Brand</label>
                            <input type="text" class="form-control {{ $errors->has('merk') ? 'is-invalid' : '' }}" name="merk" id="field-merk" value="{{ old('merk', $data->merk_t_data_usaha) }}" placeholder="Masukan Merk/Brand">
                            <x-input-error :messages="$errors->get('merk')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="field-no_izin">No Izin</label>
                            <input type="text" class="form-control {{ $errors->has('no_izin') ? 'is-invalid' : '' }}" name="no_izin" id="field-no_izin" value="{{ old('no_izin', $data->no_izin_t_data_usaha) }}" placeholder="Masukan No Izin">
                            <x-input-error :messages="$errors->get('no_izin')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="field-jenis_usaha">Jenis Usaha</label>
                            <input type="text" class="form-control {{ $errors->has('jenis_usaha') ? 'is-invalid' : '' }}" name="jenis_usaha" id="field-jenis_usaha" value="{{ old('jenis_usaha', $data->jenis_t_data_usaha) }}" placeholder="Masukan Kuliner, Fashion, dll..">
                            <x-input-error :messages="$errors->get('jenis_usaha')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="field-keterangan">Keterangan</label>
                            <input type="text" class="form-control {{ $errors->has('keterangan') ? 'is-invalid' : '' }}" name="keterangan" id="field-keterangan"  value="{{ old('keterangan', $data->keterangan_t_data_usaha) }}" placeholder="Masukan Keterangan">
                            <x-input-error :messages="$errors->get('keterangan')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="field-email">Alamat Email</label>
                            <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="field-email" value="{{ old('email', $data->email_t_data_usaha) }}"  placeholder="Masukan Alamat Email">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="field-alamat">Alamat Lengkap</label>
                            <input type="text" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="field-alamat" value="{{ old('alamat', $data->alamat_t_data_usaha) }}" placeholder="Masukan Alamat Lengkap">
                            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="field-kelurahan">Kelurahan</label>
                            <select class="form-control select2 {{ $errors->has('kelurahan') ? 'is-invalid' : '' }}" name="kelurahan" id="field-kelurahan" data-placeholder="Pilih kelurahan">
                                <option></option>
                                @foreach ($kelurahan as $t)
                                    <option value="{{ $t->id_j_kelurahan }}" {{ old('kelurahan', $data->kelurahan_t_data_usaha) == $t->id_j_kelurahan ? 'selected="selected"' : '' }}>{{ $t->nama_j_kelurahan }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('kelurahan')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-nama">Nama</label>
                            <input type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" name="nama" value="{{ old('nama', $data->nama_t_data_usaha) }}" id="field-nama" placeholder="Masukan Nama">
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="field-nik">NIK Pemilik</label>
                            <input type="text" class="form-control {{ $errors->has('nik') ? 'is-invalid' : '' }}" name="nik" value="{{ old('nik', $data->nik_t_data_usaha) }}" id="field-nik" placeholder="Masukan NIK Pemilik">
                            <x-input-error :messages="$errors->get('nik')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="field-izin">Izin Usaha</label>
                            <input type="text" class="form-control {{ $errors->has('izin') ? 'is-invalid' : '' }}" name="izin" value="{{ old('izin', $data->izin_t_data_usaha) }}" id="field-izin" placeholder="Masukan Izin Usaha">
                            <x-input-error :messages="$errors->get('izin')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="field-tahun">Tahun Berdiri</label>
                            <input type="text" class="form-control {{ $errors->has('tahun') ? 'is-invalid' : '' }}" name="tahun" value="{{ old('tahun', $data->tahun_berdiri_t_data_usaha) }}" id="field-tahun" placeholder="Masukan Tahun Berdiri">
                            <x-input-error :messages="$errors->get('tahun')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="field-produk">Produk</label>
                            <input type="text" class="form-control {{ $errors->has('produk') ? 'is-invalid' : '' }}" name="produk" value="{{ old('produk', $data->produk_t_data_usaha) }}" id="field-produk" placeholder="Masukan produk">
                            <x-input-error :messages="$errors->get('produk')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="field-sosmed">SOSMED</label>
                            <input type="text" class="form-control {{ $errors->has('sosmed') ? 'is-invalid' : '' }}" name="sosmed" value="{{ old('sosmed', $data->sosmed_t_data_usaha) }}" id="field-sosmed" placeholder="Masukan Sosial Media">
                            <x-input-error :messages="$errors->get('sosmed')" class="mt-2" />
                        </div>
                        <div class="form-group">
                            <label for="field-hp">No Handphone</label>
                            <input type="text" class="form-control {{ $errors->has('hp') ? 'is-invalid' : '' }}" name="hp" id="field-hp" value="{{ old('telp', $data->telp_t_data_usaha) }}" placeholder="Masukan No HP">
                            <x-input-error :messages="$errors->get('hp')" class="mt-2" />
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-rt">RT</label>
                                    <input type="text" class="form-control {{ $errors->has('rt') ? 'is-invalid' : '' }}" name="rt" id="field-rt"  value="{{ old('rt', $data->rt_t_data_usaha) }}" placeholder="RT">
                                    <x-input-error :messages="$errors->get('rt')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-rw">RW</label>
                                    <input type="text" class="form-control {{ $errors->has('rw') ? 'is-invalid' : '' }}" name="rw" id="field-rw"  value="{{ old('rw', $data->rw_t_data_usaha) }}" placeholder="RW">
                                    <x-input-error :messages="$errors->get('rw')" class="mt-2" />
                                </div>
                            </div>
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