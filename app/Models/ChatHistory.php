<?php

namespace App\Models;

use App\Models\Api\ChatbotStatuses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatHistory extends Model
{
    use HasFactory;

    protected $table = 'chat_histories';

    protected $fillable = [
        'sender',
        'message',
        'response',
        'confidence',
        'chatbot_status_id',
    ];

    public function chatbotStatus()
    {
        return $this->belongsTo(ChatbotStatuses::class, 'chatbot_status_id');
    }
}
