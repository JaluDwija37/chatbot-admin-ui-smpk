<?php

use App\Http\Controllers\Api\FaqController;
use App\Http\Controllers\Api\UnansweredQuestionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('/unanswered', UnansweredQuestionController::class);

Route::apiResource('faq', FaqController::class);
