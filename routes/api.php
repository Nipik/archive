<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\MailApiController;

Route::apiResource('users', UserApiController::class);

Route::group(['middleware' => 'auth:api'], function() {
    Route::resource('mails', MailApiController::class);
    Route::get('mails/deleted', [MailApiController::class, 'showDeletedMails']);
    Route::patch('mails/deleted/{id}/restore', [MailApiController::class, 'restore']);
    Route::delete('mails/deleted/{id}', [MailApiController::class, 'deletePermanently']);
    Route::get('mails/deleted/{id}', [MailApiController::class, 'showDeleted']);
});
