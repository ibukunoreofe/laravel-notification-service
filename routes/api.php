<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserNotificationController;
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

Route::post('notifications/subscribe', [UserNotificationController::class, 'subscribe']);
Route::post('notifications/unsubscribe', [UserNotificationController::class, 'unsubscribe']);

Route::post('notifications/send', [NotificationController::class, 'send']);

Route::get('notifications/{user_id}', [UserNotificationController::class, 'index']);