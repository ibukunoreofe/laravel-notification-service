<?php

/**
 * Created by Reliese Model.
 */

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

	protected $fillable = [
		'type'
	];

	public function user_notifications()
	{
		return $this->hasMany(UserNotification::class);
	}
}
