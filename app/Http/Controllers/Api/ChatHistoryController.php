<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ChatHistoryResource;
use App\Models\Api\ChatbotStatuses;
use App\Models\ChatHistory;
use Illuminate\Http\Request;

class ChatHistoryController extends Controller
{
    public function index()
    {
        $chat_history = ChatHistory::latest()->paginate(5);

        return new ChatHistoryResource(true, 'Riwayat Percakapan Telegram', $chat_history);
    }

    public function store(Request $request)
    {
       $data = $request->validate([
            'sender' => 'required|string|max:255',
            'message' => 'required|string',
            'response' => 'required|string',
            'confidence' => 'required|numeric',
        ]);
        $data['chatbot_status_id'] = optional(ChatbotStatuses::query()->latest()->first())->id; // Optional field
        

        $chat_history = ChatHistory::create($data);

        return new ChatHistoryResource(true, 'Riwayat Percakapan Telegram Berhasil Ditambahkan!', $chat_history);
    }
}
