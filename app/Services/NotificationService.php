<?php

namespace App\Services;

use App\Events\NotificationSent;
use App\Models\NotificationType;
use App\Models\User;
use App\Notifications\GeneralNotification;
use Illuminate\Support\Facades\Notification;

class NotificationService
{
    /**
     * Send a notification to a specific user.
     *
     * @param User $user
     * @param string $notificationType
     * @return void
     */
    public function sendSubscribedNotificationToUser(User $user, string $notificationType): void
    {
        $user->notify(new GeneralNotification(NotificationType::SUBSCRIPTION, $notificationType, null));
    }

    /**
     * Send a notification to a specific user.
     *
     * @param User $user
     * @param string $notificationType
     * @param string $title
     * @param string $message
     * @return void
     */
    public function sendToUser(User $user, $notificationType, $title, $message)
    {
        $user->notify(new GeneralNotification($notificationType, $title, $message));
    }

    /**
     * Send a notification to multiple users and broadcast it.
     *
     * @param \Illuminate\Support\Collection $users
     * @param string $notificationType
     * @param string $title
     * @param string $message
     * @return void
     */
    public function sendToMultipleUsers($users, $notificationType, $title, $message)
    {
        // Send notifications via email
        Notification::send($users, new GeneralNotification($notificationType, $title, $message));

        // Broadcast the event to all subscribers of the notification type
        event(new NotificationSent($notificationType, $title, $message));
    }
}
