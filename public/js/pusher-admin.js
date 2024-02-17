
var pusher = new Pusher('e17b7d08ee03ee73f23f', {
    cluster: 'ap1'
});

var chats_update_channel = pusher.subscribe('chats-update');

chats_update_channel.bind('chats', function (response) {
    $('#chat-list').empty();
    for(var i=0; i<response.chats.data.length; i++){
        var chatItem = `<li class="nav-item" id="${ response.data[i].id }" data-sender-name="${ response.data[i].name }">`;
        chatItem += `<div class="row justify-content-between mx-0">`;
        chatItem += `<div class="col-9" onclick="fetchData(this)">`;
        chatItem += `<a href="javascript:void(0)" class="nav-link px-0 text-black">`;
        chatItem += `<div class="text-sm">${ response.data[i].name }`;
        chatItem += `<div>(${ response.data[i].email })</div>`;
        chatItem += `</div>`;
        chatItem += `</div>`;
        chatItem += `<div class="col-3 d-flex justify-content-end"><div class="my-auto">`;
        if(response.data[i].unseen_messages > 0){
            chatItem += ` <div class="badge bg-primary notif">${ response.data[i].unseen_messages_count }</div>`;
        }
        chatItem += `<button class="btn btn-sm btn-danger" type="button" onclick="deleteChat(${ response.data[i].id })">
            <i class="fa fa-trash"></i>
        </button>`;
        chatItem += `</div>`;
        chatItem += `</div>`;
        chatItem += `</div>`;
        $('#chat-list').append(chatItem);
    }
});

var prevchat_id = 0;
var channel;
function fetchData(elem){
    $('.chat-list-item').removeClass('active');
    var url = '/admin/livechat/get-messages';

    $.get(url, {chat_id: $(elem).attr('id')}, function(response) {
        $('#messagesContainer').empty();
        for(var i=0; i < response.length; i++){
            if(response[i].sender == 'admin'){
                $('#messagesContainer').append('<div class="message-wrapper"><div class="profile-picture"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></div><div class="message-content"><p class="name">Admin</p><div class="message">' + response[i].pesan + '</div></div></div>');
            }
            else{
                $('#messagesContainer').append('<div class="message-wrapper reverse"><div class="profile-picture"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></div><div class="message-content"><p class="name">' + $(elem).attr('data-sender-name') + '</p><div class="message">' + response[i].pesan + '</div></div></div>');
            }
        }
        
        $('#messagesContainer').finish().animate({
            scrollTop: $('#messagesContainer').prop("scrollHeight")
        }, 250);
    });

    $('#chat-id').val($(elem).attr('id'));
    $(elem).addClass('active');

    if(prevchat_id != 0){
        channel.unbind('my-messages');
        pusher.unsubscribe(prevchat_id);
        console.log(pusher.allChannels());
    }
    channel = pusher.subscribe('chat'+ $(elem).attr('id'));
    channel.bind('my-messages', function (response) {
        console.log('subscribed to: chat' + $(elem).attr('id'));
        console.log(response);
        if(response.message.sender == 'admin'){
            $('#messagesContainer')
            .append('<div class="message-wrapper"><div class="profile-picture"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></div><div class="message-content"><p class="name">Admin</p><div class="message">' + response.message.pesan + '</div></div></div>');
        }
        else{
            $('#messagesContainer')
            .append('<div class="message-wrapper reverse"><div class="profile-picture"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></div><div class="message-content"><p class="name">' + $(elem).attr('data-sender-name') + '</p><div class="message">' + response.message.pesan + '</div></div></div>');
        }
        
        $('#messagesContainer').finish().animate({
            scrollTop: $('#messagesContainer').prop("scrollHeight")
        }, 250);
    });
    prevchat_id = $(elem).attr('id');
    pusher.allChannels().forEach(channel => console.log(channel.name));
}

function loadMore(page) {
    $("#loading").html('Loading...').show();
    var url = '/admin/livechat/data';
    $.get(url, {page: page}, function(response) {
        // console.log(response.data);
        $("#loading").html('Load more').show();
        for(var i=0; i < response.data.length; i++){
            var chatItem = `<li class="nav-item" id="${ response.data[i].id }" data-sender-name="${ response.data[i].name }">`;
            chatItem += `<div class="row justify-content-between mx-0">`;
            chatItem += `<div class="col-9" onclick="fetchData(this)">`;
            chatItem += `<a href="javascript:void(0)" class="nav-link px-0 text-black">`;
            chatItem += `<div class="text-sm">${ response.data[i].name }`;
            chatItem += `<div>(${ response.data[i].email })</div>`;
            chatItem += `</div>`;
            chatItem += `</div>`;
            chatItem += `<div class="col-3 d-flex justify-content-end"><div class="my-auto">`;
            if(response.data[i].unseen_messages > 0){
                chatItem += ` <div class="badge bg-primary notif">${ response.data[i].unseen_messages_count }</div>`;
            }
            chatItem += `<button class="btn btn-sm btn-danger" type="button" onclick="deleteChat(${ response.data[i].id })">
                <i class="fa fa-trash"></i>
            </button>`;
            chatItem += `</div>`;
            chatItem += `</div>`;
            chatItem += `</div>`;
            $('#chat-list').append(chatItem);
        }
    });
}

function deleteChat(id){

    alert('asdas');
}


$(document).ready(function(){
    var currPage = 1;
    $("#loading").on('click', function() {
        console.log('clicked');
        loadMore(++currPage);
    });

    $("#messageForm").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "/admin/livechat/send",
            data: {
                'message': $('#chat-message').val(),
                'chat_id': $('#chat-id').val(),
                'sender': 'admin'
            },
            cache: false,
            success: function (response) {
                $('#chat-message').val("");

                $('#messagesContainer')
                .append('<div class="message-wrapper"><div class="profile-picture"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></div><div class="message-content"><p class="name">Admin</p><div class="message">' + response.pesan + '</div></div></div>');

                $('#messagesContainer').finish().animate({
                    scrollTop: $('#messagesContainer').prop("scrollHeight")
                }, 250);
            }
        });
    });
});

function getMessageCont(msg)
{
    console.log('sadas');
    var elm = '';
    if(msg.sender == 'admin')
    {
        elm = `<div class="direct-chat-msg">
            <div class="direct-chat-infos clearfix">
                <span class="direct-chat-name float-left">Admin</span>
                <span class="direct-chat-timestamp float-right"> ${ msg.created_at }</span>
            </div>
            <div class="direct-chat-text ms-0">
            ${ msg.pesan }
            </div>
        </div>`;
    }else{

        elm = `<div class="message-wrapper"><div class="profile-picture"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></div><div class="message-content"><p class="name">' + $(elem).attr('data-sender-name') + '</p><div class="message">' + response.message.message + '</div></div></div>`;
    }

    return elm;
}