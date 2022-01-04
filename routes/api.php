<?php

use App\Http\Controllers\MailController;
use Dacastro4\LaravelGmail\Services\Message\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('google')->group(function() {
    Route::post('/send-mail',[MailController::class,'SendMail']);
    Route::get('/inbox',[MailController::class,'Inbox']);
    Route::get('/mail/{id}',[MailController::class,'DetailEmail']);
    Route::get('/sent',[MailController::class,'Sent']);
});

