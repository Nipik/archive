<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConversationController;
use App\Http\Controllers\MessageController;

Route::resource('conversations', ConversationController::class);
Route::resource('messages', MessageController::class);
Route::middleware(['auth:sanctum', 'api'])->group(function () {
});
