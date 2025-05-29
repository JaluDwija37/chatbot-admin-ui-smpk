<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api\ChatbotStatuses;
use Illuminate\Http\Request;

class ChatbotStatusController extends Controller
{
    public function index()
    {
        $chatbotStatuses = ChatbotStatuses::query()
            ->orderBy('created_at', 'desc')
            ->first();
        return response()->json($chatbotStatuses);
    }

    public function store(Request $request)
    {
        $request->validate([
            'status' => 'required|string|max:255',
            'message' => 'required|string|max:255',
        ]);

        $chatbotStatus = \App\Models\Api\ChatbotStatuses::create($request->all());

        return response()->json($chatbotStatus, 201);
    }
}
