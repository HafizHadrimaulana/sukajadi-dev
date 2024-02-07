@extends('layouts.base_admin.base_dashboard')
@section('judul', 'Kegiatan')

@push('styles')
{{-- <link rel="stylesheet" href="{{ asset('css/chattle_admin.min.css') }}"> --}}
@endpush


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
    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kontak</h3>
                </div>
                <div class="card-body p-0" style="display: block;">
                    <ul class="nav nav-pills flex-column">
                        @foreach ($chats as $chat)
                        <li onclick="fetchData(this)" class="nav-item" id="{{ $chat->id }}" data-sender-name="{{ $chat->name }}">
                            <a href="javascript:void(0)" class="nav-link text-black">{{ $chat->name }}
                                <div class="text-sm">({{ $chat->email }})</div>
                                @if ($chat->unseen_messages()->count() > 0)
                                    <div class="badge bg-primary float-right">
                                        {{ $chat->unseen_messages()->count() }}
                                    </div>
                                @endif
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer">
                    <button id="loading" class="btn btn-primary w-100">
                        Load more
                    </button>
                </div>

            </div>
        </div>
        <div class="col-9">
            <div class="card card-primary card-outline direct-chat direct-chat-primary">
                <div class="card-header">
                    <h3 class="card-title">Direct Chat</h3>
                </div>

                <div class="card-body">
                    <div class="direct-chat-messages" id="messagesContainer">

                    </div>
                </div>
                <div class="card-footer">
                <form id="messageForm" method="POST">
                    <div class="input-group">
                        <input type="hidden" name="id" id="chat-id" value=""/>
                        <input type="text" id="chat-message" name="message" placeholder="Tulis Pesan ..." class="form-control">
                        <span class="input-group-append">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection 

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/8.3.0/pusher.min.js" integrity="sha512-tXL5mrkSoP49uQf2jO0LbvzMyFgki//znmq0wYXGq94gVF6TU0QlrSbwGuPpKTeN1mIjReeqKZ4/NJPjHN1d2Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/js/jquery-cookie.min.js'"></script>
<script src="/js/pusher-admin.js"></script>
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