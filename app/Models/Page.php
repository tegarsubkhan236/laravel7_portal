<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Page
 * 
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $contents
 * @property int $is_commented
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Menu[] $menus
 *
 * @package App\Models
 */
class Page extends Model
{
	protected $table = 'pages';

	protected $casts = [
		'is_commented' => 'int'
	];

	protected $fillable = [
		'title',
		'slug',
		'contents',
		'is_commented'
	];

	public function menus()
	{
		return $this->hasMany(Menu::class);
	}
}
