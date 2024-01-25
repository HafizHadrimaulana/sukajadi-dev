@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Kegiatan')
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Live Chat</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Beranda</a></li>
                    <li class="breadcrumb-item active">Live Chat</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">

</section>

@endsection

@push('scripts')
    <script>
        

        $(document).ready(function() {
            
            var tahun = $("#filter-tahun").val();
            if(tahun){
                $('#filter-bulan').prop("disabled", false);
                
                $('#filter-bulan').select2({
                    ajax: {
                        url: "{{ route('json.bulan') }}" +'?tahun='+tahun,
                        dataType: 'json',
                        processResults: function (data) {
                            return {
                                results: data
                            };
                        }
                    }
                });
            }else{
                $('#filter-bulan').prop("disabled", true);
            }

            $("#filter-tahun").on("change", function(e){
                var tahun = $(this).val();
                if(tahun){
                    $('#filter-bulan').removeAttr("disabled");

                    $('#filter-bulan').select2({
                        ajax: {
                            url: "{{ route('json.bulan') }}" +'?tahun='+tahun,
                            dataType: 'json',
                            processResults: function (data) {
                                return {
                                    results: data
                                };
                            }
                        }
                    });
                }

            });

            var table = $('.datatable').DataTable({
                processing: true,
                serverSide: true,
                dom : "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                ajax: {
                    url : "{{ route('admin.timeline.index') }}",
                    data : function(data){
                            var tahun = $("#filter-tahun").val();
                            var bulan = $("#filter-bulan").val();
                            var sopd = $("#filter-sopd").val();
                            data.tahun = tahun;
                            data.bulan = bulan;
                            data.sopd = sopd;
                    }
                },
                columns: [
                    {data: 'tanggal_kegiatan', name: 'tanggal_kegiatan'},
                    {data: 'nama_j_kegiatan', name: 'nama_j_kegiatan'},
                    {data: 'nama_kegiatan', name: 'nama_kegiatan'},
                    {data: 'foto', name: 'foto'},
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
                $("#filter-bulan").val("");
                $('#filter-bulan').trigger('change');
                $("#filter-sopd").val("");
                $('#filter-sopd').trigger('change');
                $("#data-content").addClass('d-none');
                table.draw();
            });

        });
    </script>
@endpush