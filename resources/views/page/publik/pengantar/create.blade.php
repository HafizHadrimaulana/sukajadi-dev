<x-landing-layout>

    @push('styles')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    @endpush

    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h2 class="h5">Permohnan Surat Pengantar {{ $title }}</h2>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pengantar.index') }}">Surat Pengantar</a></li>
                        <li class="breadcrumb-item active">
                            {{ $title }}
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    
    <section class="content">
        <div class="container">
            <div class="border-1 card rounded-2">
                <div class="card-body bg-white rounded-2">
                    <form id="form-kegiatan" method="POST" action="{{ route('pengantar.store') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{ $jenis }}" name="kategori">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-nama">Nama</label>
                                    <input type="text" class="form-control {{ $errors->has('nama') ? 'is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" id="field-nama" placeholder="Masukan Nama">
                                    <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-nama">Jenis Kelamin</label>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jk"
                                                id="jk-lk" value="Laki-Laki" checked>
                                            <label class="form-check-label" for="jk-lk">Laki-Laki</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="jk"
                                                id="jk-pr" value="Perempuan">
                                            <label class="form-check-label" for="jk-pr">Perempuan</label>
                                        </div>
                                    </div>
                                    <x-input-error :messages="$errors->get('jk')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-tmp_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control {{ $errors->has('tmp_lahir') ? 'is-invalid' : '' }}" name="tmp_lahir" id="field-tmp_lahir" value="{{ old('tmp_lahir') }}" placeholder="Masukan Tempat Lahir">
                                    <x-input-error :messages="$errors->get('tmp_lahir')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="field-tgl_lahir">Tanggal Lahir</label>
                                    <input type="text" class="form-control bg-white {{ $errors->has('tgl_lahir') ? 'is-invalid' : '' }}" name="tgl_lahir" id="field-tgl_lahir" placeholder="Masukan Tanggal Lahir">
                                    <x-input-error :messages="$errors->get('tgl_lahir')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-agama">Agama</label>
                                    <select class="form-control" name="agama" id="field-agama">
                                        <option value="">Pilih</option>
                                        <option value="Islam" {{ old('agama', $data->agama ?? '') == 'Islam' ? 'selected="selected"' : '' }}>Islam</option>
                                        <option value="Kristen Protestan" {{ old('agama', $data->agama ?? '') == 'Kristen Protestan' ? 'selected="selected"' : '' }}>Kristen Protestan</option>
                                        <option value="Kristen Katolik" {{ old('agama', $data->agama ?? '') == 'Kristen Katolik' ? 'selected="selected"' : '' }}>Kristen Katolik</option>
                                        <option value="Hindu" {{ old('agama', $data->agama ?? '') == 'Hindu' ? 'selected="selected"' : '' }}>Hindu</option>
                                        <option value="Budha" {{ old('agama', $data->agama ?? '') == 'Budha' ? 'selected="selected"' : '' }}>Budha</option>
                                        <option value="Konghucu" {{ old('agama', $data->agama ?? '') == 'Konghucu' ? 'selected="selected"' : '' }}>Konghucu</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('agama')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-agama">Status Perkawinan</label>
                                    <div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="status_pernikahan" id="status_pernikahan1" value="Lajang" value="{{ !empty($anggota['status_pernikahan']) &&  $anggota['status_pernikahan'] == 'Lajang' ? '' : 'checked="checked"' }}" checked="checked">
                                            <label class="custom-control-label" for="status_pernikahan1">Lajang</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="status_pernikahan" id="status_pernikahan2" value="Menikah" value="{{ !empty($anggota['status_pernikahan']) &&  $anggota['status_pernikahan'] == 'Menikah' ? '' : 'checked="checked"' }}">
                                            <label class="custom-control-label" for="status_pernikahan2">Menikah</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="status_pernikahan" id="status_pernikahan3" value="Duda/Janda" value="{{ !empty($anggota['status_pernikahan']) &&  $anggota['status_pernikahan'] == 'Duda/Janda' ? '' : 'checked="checked"' }}">
                                            <label class="custom-control-label" for="status_pernikahan3">Duda/Janda</label>
                                        </div>
                                    </div>

                                    <x-input-error :messages="$errors->get('agama')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-agama">Pekerjaan</label>
                                    <select class="form-control" id="field-pekerjaan" name="pekerjaan">
                                        <option value="">Pilih</option>
                                        <option {{ old('pekerjaan') === 'Pelajar/Mahasiswa' ? 'selected="selected"' : ''}} value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                                        <option {{ old('pekerjaan') === 'Pegawai Swasta' ? 'selected="selected"' : ''}} value="Pegawai Swasta">Pegawai Swasta</option>
                                        <option {{ old('pekerjaan') === 'Pensiunan' ? 'selected="selected"' : ''}} value="Pensiunan">Pensiunan</option>
                                        <option {{ old('pekerjaan') === 'Ibu Rumah Tangga' ? 'selected="selected"' : ''}} value="Ibu Rumah Tangga">Ibu Rumah Tangga</option>
                                        <option {{ old('pekerjaan') === 'Pegawai Negeri' ? 'selected="selected"' : ''}} value="Pegawai Negeri">Pegawai Negeri</option>
                                        <option {{ old('pekerjaan') === 'Guru' ? 'selected="selected"' : ''}} value="Guru">Guru</option>
                                        <option {{ old('pekerjaan') === 'Wiraswasta' ? 'selected="selected"' : ''}} value="Wiraswasta">Wiraswasta</option>
                                        <option {{ old('pekerjaan') === 'TNI/Polisi' ? 'selected="selected"' : ''}} value="TNI/Polisi">TNI/Polisi</option>
                                        <option {{ old('pekerjaan') === 'Lainnya' ? 'selected="selected"' : ''}} value="Lainnya">Lainnya</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('pekerjaan')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-kewarganegaraan">Kewarganegaraan</label>
                                    <div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="kewarganegaraan" id="kewarganegaraan-1" value="WNI" value="{{ old('kewarganegaraan') == 'WNI' ? '' : 'checked="checked"' }}" checked="checked">
                                            <label class="custom-control-label" for="kewarganegaraan-1">WNI</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="kewarganegaraan" id="kewarganegaraan-2" value="WNA" value="{{ old('kewarganegaraan') == 'WNA' ? '' : 'checked="checked"' }}">
                                            <label class="custom-control-label" for="kewarganegaraan-2">WNA</label>
                                        </div>
                                    </div>

                                    <x-input-error :messages="$errors->get('agama')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-email">Email</label>
                                    <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="field-email"  value="{{ old('email') }}" placeholder="Masukan Alamat Email">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-alamat">Alamat</label>
                                    <input type="text" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat"  value="{{ old('alamat') }}" id="field-alamat" placeholder="Masukan Alamat">
                                    <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="field-rt">RT</label>
                                    <input type="text" class="form-control {{ $errors->has('rt') ? 'is-invalid' : '' }}" name="rt" id="field-rt"  value="{{ old('rt') }}" placeholder="000">
                                    <x-input-error :messages="$errors->get('rt')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label for="field-rw">RW</label>
                                    <input type="text" class="form-control {{ $errors->has('rw') ? 'is-invalid' : '' }}" name="rw" id="field-rw"  value="{{ old('rw') }}" placeholder="000">
                                    <x-input-error :messages="$errors->get('rw')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="field-kelurahan">Kelurahan</label>
                                    <select class="form-control select2 {{ $errors->has('kelurahan') ? 'is-invalid' : '' }}" name="kelurahan" id="field-kelurahan" data-placeholder="Pilih kelurahan">
                                        <option></option>
                                        @foreach ($kelurahan as $t)
                                            <option value="{{ $t->id_j_kelurahan }}" {{ old('kelurahan') == $t->id_j_kelurahan ? 'selected="selected"' : '' }}>{{ $t->nama_j_kelurahan }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('kelurahan')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Kirim
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        

        $(document).ready(function() {

            $("#field-tgl_lahir").flatpickr({
                altInput: true,
                altFormat: "j F Y",
                dateFormat: "Y-m-d"
            });


            $("#field-jenis").on("change", function(){
                // e.preventDefault();?
                var val = $("#field-jenis").val();
                if(val != ""){
                    $("#field-jenis_id").prop("disabled", false);

                }else{
                    $("#field-jenis_id").prop("disabled", true);
                }
            });

            
            $('#field-jenis_id').select2({
                placeholder: "Kategori Jenis",
                theme: "bootstrap",
                ajax: {
                    url: '/kda/jenis',
                    dataType: 'json',
                    data: function (params) {
                        return {
                            q: $.trim(params.term),
                            jenis : $("#field-jenis").val()
                        };
                    },
                    processResults: function (data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            });

        });
    </script>
@endpush
</x-landing-layout>

