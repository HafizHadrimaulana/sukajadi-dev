<?php

namespace App\Models;

use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'chat_messages';
    protected $guarded = ['id'];
    protected $fillable = [
        'chat_id', 'type', 'pesan', 'is_seen', 'sender'
    ];

    public function chat()
    {
        return $this->belongsTo(Chat::class, 'chat_id');
    }

}