<?php

namespace App\Core\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\Core\Models\User
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string|null $api_token
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\User whereApiToken( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\User whereCreatedAt( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\User whereEmail( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\User whereId( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\User wherePassword( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\User whereRememberToken( $value )
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\User whereUpdatedAt( $value )
 * @mixin \Eloquent
 */
class User extends Authenticatable {
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'email',
		'password',
		'api_token',

	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password',
		'remember_token',
		'api_token',
	];
}// User
