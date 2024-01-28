<?php

namespace App\Models;

use Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'chat_messages';
    protected $guarded = ['id'];
    protected $fillable = [
        'chat_id', 'type', 'pesan', 'is_seen', 'sender'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /**
     * Get the chat that the message belongs to
     */
    public function chat()
    {
        return $this->belongsTo(Chat::class, 'chat_id');
    }

    /**
     * Get the sender of the message
     */
    // public function sender()
    // {
    //     return $this->belongsTo(User::class, 'sender_id');
    // }
}