<?php

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Core\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Core\Models\Post whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Post extends Model
{
	protected $fillable = [
		'title', 'description',
	];

}
