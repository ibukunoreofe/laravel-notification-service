<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Notification
 *
 * @property int $id
 * @property string $type
 * @property string $message
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Notification extends Model
{
    protected $table = 'notifications';

    protected $fillable = [
        'type',
        'message',
        'status'
    ];
}
