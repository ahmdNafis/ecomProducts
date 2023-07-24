<?php

namespace App\Models;

use App\Models\MessageType;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $fillable = ['message_title', 'message_body', 'message_type_id', 'user_id'];

    public function messageType() {
        return $this->belongsTo(MessageType::class, 'message_type_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
