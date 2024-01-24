<x-landing-layout>
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Penghargaan Tahun <small>{{ $tahun }}</small></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Beranda</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('data.penghargaan.indexs') }}">Penghargaan</a></li>
                        <li class="breadcrumb-item active">{{ $tahun}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container">
            <div class="border-1 card rounded-2">
                <div class="card-body bg-white rounded-2">
                    <table class="table table-bordered datatable w-100">
                        <thead>
                            <tr>
                                <th>TANGGAL</th>
                                <th>TINGKAT</th>
                                <th>TEMPAT</th>
                                <th>PENGHARGAAN</th>
                                <th>PEMBERI</th>
                                <th>PEMILIK</th>
                                <th>SOPD</th>
                                <th>FILE</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
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
                        url : "{{ route('data.penghargaan.show', $tahun) }}",
                        data : function(data){
                                var tahun = $("#filter-tahun").val();
                                data.tahun = tahun;
                        }
                    },
                    columns: [
                        {data: 'tanggal_t_data_penghargaan', name: 'tanggal_t_data_penghargaan'},
                        {data: 'nama_j_data_penghargaan', name: 'nama_j_data_penghargaan'},
                        {data: 'tempat_t_data_penghargaan', name: 'tempat_t_data_penghargaan'},
                        {data: 'nama_t_data_penghargaan', name: 'nama_t_data_penghargaan'},
                        {data: 'pemberi_t_data_penghargaan', name: 'pemberi_t_data_penghargaan'},
                        {data: 'pemilik_t_data_penghargaan', name: 'pemilik_t_data_penghargaan'},
                        {data: 'nama_j_sopd', name: 'nama_j_sopd'},
                        {data: 'file_t_data_penghargaan', name: 'file_t_data_penghargaan'},
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

