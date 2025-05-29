<?php

use App\Http\Controllers\Admin\ChatHistoryController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\UnansweredController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('faq')->name('faq.')->controller(FaqController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('{faq}/edit', 'edit')->name('edit');
        Route::patch('{faq}', 'update')->name('update');
        Route::delete('{faq}', 'destroy')->name('destroy');
    });
    Route::prefix('/unanswered-question')->name('unanswered-question.')->controller(UnansweredController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::delete('{unanswered_question}', 'destroy')->name('destroy');
    });

    Route::get('/chat-history', [ChatHistoryController::class, 'index'])->name('chat-history.index');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
