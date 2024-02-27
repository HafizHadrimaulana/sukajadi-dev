@extends('layouts.base_admin.base_dashboard') 
@section('judul', 'Ubah Pengguna')

@push('styles')

@endpush
@section('content')


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Ubah Pengguna</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Pengguna</a></li>
                    <li class="breadcrumb-item active">Ubah</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="border-1 card rounded-2">
        <div class="card-body bg-white rounded-2">
            <form id="form-kegiatan" method="POST" action="{{ route('admin.akun.update', $data->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-nama">Nama</label>
                            <input type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" value="{{ old('nama', $data->name)}}" name="nama" id="field-nama" placeholder="Masukan Nama">
                            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-email">Email</label>
                            <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email', $data->email)}}" id="field-nama" placeholder="Masukan Email">
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="field-role">Hak Akses</label>
                            <select class="form-control select2 {{ $errors->has('role') ? 'is-invalid' : '' }}" name="role" id="field-role" data-placeholder="Pilih Hak Akses">
                                <option></option>
                                <option value="superadmin" {{ old('role', $data->roles[0]->name) == 'superadmin' ? 'selected="selected"' : '' }}>Super Admin</option>
                                <option value="admin" {{ old('role', $data->roles[0]->name) == 'admin' ? 'selected="selected"' : '' }}>Admin</option>
                                <option value="kecamatan" {{ old('role', $data->roles[0]->name) == 'kecamatan' ? 'selected="selected"' : '' }}>Kecamatan</option>
                                <option value="kelurahan" {{ old('role', $data->roles[0]->name) == 'kelurahan' ? 'selected="selected"' : '' }}>Kelurahan</option>
                                <option value="lkk" {{ old('role', $data->roles[0]->name) == 'lkk' ? 'selected="selected"' : '' }}>LKK</option>
                            </select>
                            <x-input-error :messages="$errors->get('role')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="field-sopd">SOPD</label>
                            <select class="form-control select2 {{ $errors->has('sopd') ? 'is-invalid' : '' }}" name="sopd" id="field-sopd" data-placeholder="Pilih SOPD">
                                <option></option>
                                @foreach ($sopd as $t)
                                    <option value="{{ $t->id_j_sopd }}" {{ old('sopd', $data->sopd_id) == $t->id_j_sopd ? 'selected="selected"' : '' }}>{{ $t->nama_j_sopd }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('sopd')" class="mt-2" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="field-password">Password</label>
                            <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" id="field-password" placeholder="Masukan Password">
                            <x-input-error :messages="$errors->get('tahun')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="field-password_conf">Konfirmasi Password</label>
                            <input type="password_conf" class="form-control {{ $errors->has('password_conf') ? 'is-invalid' : '' }}" name="password_conf" id="field-password_conf" placeholder="Masukan Konfirmasi Password">
                            <x-input-error :messages="$errors->get('password_conf')" class="mt-2" />
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