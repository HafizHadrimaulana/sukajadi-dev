<x-landing-layout>

    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Surat Pengantar</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                        <li class="breadcrumb-item active">Surat Pengantar</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    
    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="font-weight-bold h6 mb-3">Pengantar KTP</h3>
                            <a href="{{ route('pengantar.create', 'ktp') }}" class="btn btn-block btn-primary mb-2">
                                Buat Permohonan
                            </a>
                            <p class="mb-0">Permohonan Surat Pengantar KTP</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="font-weight-bold h6 mb-3">Pengantar KK</h3>
                            <a href="{{ route('pengantar.create', 'kk') }}" class="btn btn-block btn-primary mb-2">
                                Buat Permohonan
                            </a>
                            <p class="mb-0">Permohonan Surat Pengantar KK</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="font-weight-bold h6 mb-3">Pengantar Surat Pindah / Masuk</h3>
                            <a href="{{ route('pengantar.create', 'pindah') }}" class="btn btn-block btn-primary mb-2">
                                Buat Permohonan
                            </a>
                            <p class="mb-0">Permohonan Surat Pindah / Masuk</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="font-weight-bold h6 mb-3">Pengantar Surat Izin Usaha</h3>
                            <a href="{{ route('pengantar.create', 'usaha') }}" class="btn btn-block btn-primary mb-2">
                                Buat Permohonan
                            </a>
                            <p class="mb-0">Permohonan Surat Izin Usaha</p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <h3 class="font-weight-bold h6 mb-3">Pengantar Surat Domisili</h3>
                            <a href="{{ route('pengantar.create', 'domisili') }}" class="btn btn-block btn-primary mb-2">
                                Buat Permohonan
                            </a>
                            <p class="mb-0">Permohonan Surat Domisili</p>
                        </div>
                    </div>
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

