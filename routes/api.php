<?php

use App\Http\Controllers\Api\ChatbotStatusController;
use App\Http\Controllers\Api\ChatHistoryController;
use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\UnansweredQuestionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'api.'], function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    })->middleware('auth:sanctum')->name('user');

    Route::apiResource('/unanswered', UnansweredQuestionController::class)->names([
        'index' => 'unanswered.index',
        'store' => 'unanswered.store',
        'show' => 'unanswered.show',
        'update' => 'unanswered.update',
        'destroy' => 'unanswered.destroy',
    ]);

    Route::apiResource('faq', FaqController::class)->names([
        'index' => 'faq.index',
        'store' => 'faq.store',
        'show' => 'faq.show',
        'update' => 'faq.update',
        'destroy' => 'faq.destroy',
    ]);

    Route::post('chatbot_status', [ChatbotStatusController::class, 'store'])
        ->name('chatbot_status.store');

    Route::get('chatbot_status', [ChatbotStatusController::class, 'index'])
        ->name('chatbot_status.index');

    Route::apiResource('/chat_history', ChatHistoryController::class)->names([
        'index' => 'chat_history.index',
        'store' => 'chat_history.store',
        'show' => 'chat_history.show',
        'update' => 'chat_history.update',
        'destroy' => 'chat_history.destroy',
    ]);
});
