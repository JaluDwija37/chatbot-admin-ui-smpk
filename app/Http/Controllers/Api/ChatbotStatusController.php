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
            'learning_rate' => 'nullable|numeric|min:0|max:1',
            'batch_size' => 'nullable|integer|min:1',
            'optimizer' => 'nullable|string|max:255',
            'testing_percentage' => 'nullable|numeric|min:0|max:100',
            'accuracy' => 'nullable|numeric|min:0|max:1',
            'precision' => 'nullable|numeric|min:0|max:1',
            'recall' => 'nullable|numeric|min:0|max:1',
        ]);

        $chatbotStatus = \App\Models\Api\ChatbotStatuses::create($request->all());

        return response()->json($chatbotStatus, 201);
    }
}
