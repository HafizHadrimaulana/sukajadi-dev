Pusher.logToConsole = true;
const pusher = new Pusher('48d7eff46a84a5298751', {
    wsHost: '127.0.0.1',
    wsPort: 6001,
    wssPort: 6001,
    disableStats: true,
    enabledTransports: ['ws', 'wss'],
    cluster: 'ap1',
});

$(document).ready(function(){
    var ch = $.cookie("ch");
    

    $("#messageForm").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "/chat/sent-message",
            data: {
                'message': $('#message').val(),
                'chat_id': $.cookie("ch"),
                'sender': 'warga'
            },
            cache: false,
            success: function (response) {
                $('#message').val("");
                console.log("sent ajax form");
                console.log(response);
                $('#messagesContainer').finish().animate({
                    scrollTop: $('#messagesContainer').prop("scrollHeight")
                }, 250);
            }
        });
    });

    if(ch == null){
        $('.close-button').on('click', function(){
            $('.chat-container').css("display","none");
            $('.chat-button').css("display","block");
        });
        $('.chat-button').on('click', function(){
            if($.cookie("ch") == null){
                $('#messagesContainer').css("display","none");
                $('#inputContainer').css("display","none");
                $('#chatContactContainer').css("display","block");
                $('.chat-button').css("display","none");
                $('.chat-container').css("display","flex");
                $("#contactForm").on('submit', function (e) {
                e.preventDefault();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: "/chat/create",
                    data: {
                        'name': $('#chat-name').val(),
                        'email': $('#chat-email').val(),
                        'hp': $('#chat-hp').val(),
                    },
                    cache: false,
                    success: function (response) {
                        console.log("sent ajax form");
                        console.log(response);
                        if(response.fail == true){
                            // if(response.errors.length){
                                for (control in response.errors) {
                                    $('#chat-' + control).addClass('is-invalid');
                                    $('#error-' + control).html(response.errors[control]);
                                }
                            // }
                        }else{
                            $.cookie("ch", response.data.id, { expires : 1 });
                            $.cookie("nm", response.data.name, { expires : 1 });
                            var channel = pusher.subscribe('chat'+response.data.id);
                            channel.bind('my-messages', function (response) {
                                $('#messagesContainer').find('.direct-chat-messages')
                                .append(getMessageCont(response.message));
                                
                                $('#messagesContainer').append(elm)
                                $('#messagesContainer').finish().animate({
                                    scrollTop: $('#messagesContainer').prop("scrollHeight")
                                }, 250);
                            });
                            $('#chatContactContainer').css("display","none");
                            $('#messagesContainer').css("display","block");
                            $('#inputContainer').css("display","block");
                            $('.chat-button').css("display","none");
                            $('.chat-container').css("display","flex");
                        }
                    }
                });
            });
            }
            else{
                $('#chatContactContainer').css("display","none");
                $('#messagesContainer').css("display","block");
                $('#inputContainer').css("display","block");
                $('.chat-button').css("display","none");
                $('.chat-container').css("display","flex");
            }
        });
    }
    else{
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "GET",
            url: "/chat/get-message",
            data: {
                'chat_id': $.cookie("ch"),
            },
            cache: false,
            success: function (response) {
                console.log("sent ajax form");
                console.log(response);
                for(var i=0; i < response.length; i++){
                    if(response[i].sender == 'admin'){
                        $('#messagesContainer').append('<div class="message-wrapper"><div class="profile-picture"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></div><div class="message-content"><p class="name">Admin</p><div class="message">' + response[i].message + '</div></div></div>');
                    }
                    else{
                        $('#messagesContainer').append('<div class="message-wrapper reverse"><div class="profile-picture"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></div><div class="message-content"><p class="name">' + $.cookie('nm') + '</p><div class="message">' + response[i].message + '</div></div></div>');
                    }
                }
                $('#messagesContainer').finish().animate({
                    scrollTop: $('#messagesContainer').prop("scrollHeight")
                }, 250);
            }
        });
        var channel = pusher.subscribe('chat'+ $.cookie("ch"));
        channel.bind('my-messages', function (response) {
            $('#messagesContainer').find('.direct-chat-messages')
            .append(getMessageCont(response.message));

            $('#messagesContainer').find('.direct-chat-messages').finish().animate({
                scrollTop: $('#messagesContainer').find('.direct-chat-messages').prop("scrollHeight")
            }, 250);
        });
        

        $('.close-button').on('click', function(){
            $('.chat-container').css("display","none");
            $('.chat-button').css("display","block");
        });
        $('.chat-button').on('click', function(){
            console.log('coba');
            $('#chatContactContainer').css("display","none");
            $('#messagesContainer').css("display","block");
            $('#inputContainer').css("display","block");
            $('.chat-button').css("display","none");
            $('.chat-container').css("display","flex");
            $('#messagesContainer').finish().animate({
                scrollTop: $('#messagesContainer').prop("scrollHeight")
            }, 250);
        });
    }
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

        elm = `<div class="direct-chat-msg right">
            <div class="direct-chat-infos clearfix">
                <span class="direct-chat-name float-right">${ $.cookie("nm") }</span>
                <span class="direct-chat-timestamp float-left">${ msg.created_at }</span>
            </div>
            <div class="direct-chat-text me-0">
                ${ msg.pesan }
            </div>
        </div>`;
    }

    return elm;
}