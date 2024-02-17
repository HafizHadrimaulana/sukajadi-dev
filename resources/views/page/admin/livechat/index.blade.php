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
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kontak</h3>
                </div>
                <div class="card-body p-0" style="display: block; height: 250px; overflow: auto;">
                    <ul class="nav nav-pills flex-column" id="chat-list">
                        @foreach ($chats as $chat)
                        <li class="nav-item" id="{{ $chat->id }}" data-sender-name="{{ $chat->name }}">
                            <div class="row justify-content-between mx-0">
                                <div class="col-9" onclick="fetchData(this)">
                                    <a href="javascript:void(0)" class="nav-link px-0 text-black">
                                        <div class="text-sm">
                                            {{ $chat->name }}
                                            <div>({{ $chat->email }})</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-3 d-flex justify-content-end">
                                    <div class="my-auto">
                                        @if ($chat->unseen_messages()->count() > 0)
                                            <div class="badge bg-primary notif">
                                                {{ $chat->unseen_messages()->count() }}
                                            </div>
                                        @endif
                                        <button class="btn btn-sm btn-danger" type="button" onclick="deleteChat({{ $chat->id }})">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
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
        <div class="col-8">
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
<script src="{{ asset('js/jquery-cookie.min.js') }}"></script>
<script src="/js/pusher-admin.js"></script>
<script>
    

    $(document).ready(function() {
    });
</script>
@endpush