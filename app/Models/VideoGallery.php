<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VideoGallery
 * 
 * @property int $id
 * @property string $name
 * @property string $desc
 * @property string $url
 * @property string $type
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class VideoGallery extends Model
{
	protected $table = 'video_galleries';

	protected $fillable = [
		'name',
		'desc',
		'url',
		'type'
	];
}
