<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatUpdate
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $chats;

    
    public function __construct($chats)
    {
        $this->chats = $chats;
    }
  
    public function broadcastOn()
    {
        return ['chats-update'];
    }
  
    public function broadcastAs()
    {
        return 'chats';
    }
}
