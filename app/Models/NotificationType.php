<?php


namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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

	protected $fillable = [
		'type'
	];

	public function user_notifications()
	{
		return $this->hasMany(UserNotification::class);
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
        ];
    }
}
