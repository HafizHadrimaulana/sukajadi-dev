<x-landing-layout>

    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengajuan Data KDA</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                        <li class="breadcrumb-item active">Pengajuan Data KDA</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    
    <section class="content">
        <div class="container">
            <div class="border-1 card rounded-2">
                <div class="card-body bg-white rounded-2">
                    <form id="form-kegiatan" method="POST" action="{{ route('data.kda.store') }}" enctype="multipart/form-data">
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
                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group">
                                            <label for="field-jenis_id">Kategori Jenis</label>
                                            <select class="form-control select2-single {{ $errors->has('jenis_id') ? 'is-invalid' : '' }}" name="jenis_id" id="field-jenis_id" disabled data-placeholder="Pilih Kategori Jenis">
                                                <option></option>
                                            </select>
                                            <x-input-error :messages="$errors->get('jenis_id')" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="col-4">
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
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="field-keterangan">Keterangan</label>
                            <textarea class="form-control" row="4" name="keterangan" id="field-keterangan" placeholder="Masukan Keterangan"></textarea>
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
    <script>
        

        $(document).ready(function() {

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

