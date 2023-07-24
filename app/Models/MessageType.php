<?php

namespace App\Models;

use App\Models\Message;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageType extends Model
{
    use HasFactory;

    protected $table = 'message_types';
    protected $fillable = ['message_type_title', 'message_type_enabled'];

    public function messages() {
        return $this->hasMany(Message::class, 'message_type_id');
    }
}
