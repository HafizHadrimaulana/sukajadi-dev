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

            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                dom : "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                ajax: {
                    url : "{{ route('data.sarpras.index') }}",
                    data : function(data){
                            var tahun = $("#filter-tahun").val();
                            data.tahun = tahun;
                    }
                },
                columns: [
                    {data: 'nama_j_data_sarpras', name: 'nama_j_data_sarpras'},
                    {data: 'jumlah', name: 'jumlah'},
                    {
                        data: 'action', 
                        name: 'action', 
                        orderable: true, 
                        searchable: true
                    },
                ]
            });
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
</x-landing-layout>

