<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;
use Illuminate\Http\Request;
use App\Models\NotificationType;
use App\Models\User;

class UserNotificationController extends Controller
{
    public function index($user_id)
    {
        $user = User::findOrFail($user_id);
        $notifications = $user->notificationTypes;

        return response()->json($notifications);
    }

    /**
     * Subscribe a user to a notification type.
     */
    public function subscribe(Request $request, NotificationService $notificationService)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'notification_type' => 'required|string|exists:notification_types,type',
        ]);

        $user = User::findOrFail($request->user_id);
        $notificationType = NotificationType::where('type', $request->notification_type)->first();

        $user->notificationTypes()->syncWithoutDetaching([$notificationType->id]);

        $notificationService->sendSubscribedNotificationToUser(
            $user,
            $request->notification_type
        );

        return response()->json(['message' => 'Subscribed successfully.']);
    }

    /**
     * Unsubscribe a user from a notification type.
     */
    public function unsubscribe(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'notification_type' => 'required|string|exists:notification_types,type',
        ]);

        $user = User::findOrFail($request->user_id);
        $notificationType = NotificationType::where('type', $request->notification_type)->first();

        $user->notificationTypes()->detach($notificationType->id);

        return response()->json(['message' => 'Unsubscribed successfully.']);
    }
}
