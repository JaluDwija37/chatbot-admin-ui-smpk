<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatHistory;
use Illuminate\Http\Request;

class ChatHistoryController extends Controller
{
    public function index(){
        $chat_histories = ChatHistory::query()->with('chatbotStatus')->orderBy('created_at', 'desc')->get();

        return view('chat-history', compact('chat_histories'));
    }
}
