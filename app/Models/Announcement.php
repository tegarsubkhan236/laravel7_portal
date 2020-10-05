<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Announcement
 * 
 * @property int $id
 * @property string $title
 * @property string $contents
 * @property string|null $files
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @package App\Models
 */
class Announcement extends Model
{
	protected $table = 'announcements';

	protected $fillable = [
		'title',
		'contents',
		'files'
	];
}
