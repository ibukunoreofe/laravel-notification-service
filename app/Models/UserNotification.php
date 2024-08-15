<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserNotification
 *
 * @property int $user_id
 * @property int $notification_type_id
 *
 * @property User $user
 * @property NotificationType $notification_type
 *
 * @package App\Models
 */
class UserNotification extends Model
{
    protected $table = 'user_notifications';
    public $incrementing = false;
    public $timestamps = false;

    protected $casts = [
        'user_id' => 'int',
        'notification_type_id' => 'int'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notification_type()
    {
        return $this->belongsTo(NotificationType::class);
    }
}
