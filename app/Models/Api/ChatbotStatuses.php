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
        'learning_rate',
        'batch_size',
        'optimizer',
        'testing_percentage',
        'accuracy',
        'precision',
        'recall',
        'created_at',
        'updated_at',
    ];

    protected $table = 'chatbot_statuses';

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function chatHistories()
    {
        return $this->hasMany(\App\Models\ChatHistory::class, 'chatbot_status_id');
    }
}
