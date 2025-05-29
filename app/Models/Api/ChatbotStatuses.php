<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatbotStatuses extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'message',
        'created_at',
        'updated_at',
    ];

    protected $table = 'chatbot_statuses';

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
