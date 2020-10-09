<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ImageGallery
 * 
 * @property int $id
 * @property string $name
 * @property string $desc
 * @property string|null $image
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class ImageGallery extends Model
{
	protected $table = 'image_galleries';

	protected $fillable = [
		'name',
		'desc',
		'image'
	];
}
