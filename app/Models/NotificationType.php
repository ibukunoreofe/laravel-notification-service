<?php


namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Class NotificationType
 * 
 * @property int $id
 * @property string $type
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|UserNotification[] $user_notifications
 *
 * @package App\Models
 */
class NotificationType extends Model
{
	protected $table = 'notification_types';

    // Define notification types as constants
    const ALERT = 'alert';
    const NEWS = 'news';
    const UPDATE = 'update';
    const SUBSCRIPTION = 'subscription';

	protected $fillable = [
		'type'
	];

	public function user_notifications()
	{
		return $this->hasMany(UserNotification::class);
	}

    /**
     * The users that are subscribed to this notification type.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_notifications', 'notification_type_id', 'user_id');
    }

    /**
     * An array of all notification types
     *
     * @return string[]
     */
    public static function getTypes(): array
    {
        return [
            self::ALERT,
            self::NEWS,
            self::UPDATE,
            self::SUBSCRIPTION,
        ];
    }
}
