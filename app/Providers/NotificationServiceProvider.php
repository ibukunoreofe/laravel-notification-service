<?php

namespace App\Providers;

use App\Models\NotificationType;
use App\Notifications\Handlers\AlertNotificationHandler;
use App\Notifications\Handlers\NewsNotificationHandler;
use App\Notifications\Handlers\SubscriptionConfirmationHandler;
use App\Notifications\Handlers\UpdatesNotificationHandler;
use Illuminate\Support\ServiceProvider;

class NotificationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('notification.handlers', function () {
            return [
                NotificationType::ALERT => AlertNotificationHandler::class,
                NotificationType::NEWS => NewsNotificationHandler::class,
                NotificationType::SUBSCRIPTION => SubscriptionConfirmationHandler::class,
                NotificationType::UPDATE => UpdatesNotificationHandler::class,
            ];
        });
    }

    public function boot()
    {
        //
    }
}
