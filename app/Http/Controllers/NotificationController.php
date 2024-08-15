<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;
use Illuminate\Http\Request;
use App\Models\User;

class NotificationController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    /**
     * Send a notification to a user.
     */
    public function send(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'notification_type' => 'required|string|exists:notification_types,type',
            'title' => 'required|string',
            'message' => 'required|string',
        ]);

        $user = User::findOrFail($request->user_id);

        $this->notificationService->sendToUser(
            $user,
            $request->notification_type,
            $request->title,
            $request->message
        );

        return response()->json(['message' => 'Notification sent successfully.']);
    }
}
