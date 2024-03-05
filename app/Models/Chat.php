<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    
    protected $table = 'chats';
    protected $guarded = ['id'];
    protected $fillable = ['name', 'email', 'unseen_messages', 'last_sender'];


    public function warga(){
        return $this->belongsTo(Warga::class, 'warga_id');
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function unseen_messages(){
        return $this->messages()->where('sender', 'warga')->where('is_seen', 0);
    }
}