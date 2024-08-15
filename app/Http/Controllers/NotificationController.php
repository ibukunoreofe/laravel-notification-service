<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;
use Illuminate\Http\Request;
use App\Models\NotificationType;

class NotificationController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    /**
     * Send a notification to all users subscribed to a specific notification type.
     */
    public function send(Request $request)
    {
        $request->validate([
            'notification_type' => 'required|string|exists:notification_types,type',
            'title' => 'required|string',
            'message' => 'required|string',
        ]);

        // Find the notification type
        $notificationType = NotificationType::where('type', $request->notification_type)->firstOrFail();

        // Get all users subscribed to this notification type
        $subscribedUsers = $notificationType->users;

        if ($subscribedUsers->isEmpty()) {
            return response()->json(['message' => 'No users subscribed to this notification type.'], 404);
        }

        // Send the notification to all subscribed users
        $this->notificationService->sendToMultipleUsers(
            $subscribedUsers,
            $request->notification_type,
            $request->title,
            $request->message
        );

        return response()->json(['message' => 'Notification sent successfully to all subscribed users.']);
    }
}
