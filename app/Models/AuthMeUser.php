<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

/**
 * AuthMeUser
 *
 * @property string $username
 * @property string $email
 * @property string realname
 * @property Player $player
 */
class AuthMeUser extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use LogsActivity;

    protected $table = "authme";

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'realname'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function player(): HasOne
    {
        return $this->hasOne(Player::class, 'Nick', 'username');
    }
}
