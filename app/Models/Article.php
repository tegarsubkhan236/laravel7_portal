<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 * 
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $contents
 * @property int $files
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Category $category
 *
 * @package App\Models
 */
class Article extends Model
{
	protected $table = 'articles';

	protected $casts = [
		'category_id' => 'int',
		'files' => 'int'
	];

	protected $fillable = [
		'category_id',
		'title',
		'contents',
		'files'
	];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}
}
