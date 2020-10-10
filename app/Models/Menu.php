<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Menu
 * 
 * @property int $id
 * @property string $name
 * @property string|null $link
 * @property int $is_blank
 * @property int $is_visibility
 * @property int|null $page_id
 * @property int|null $parent_id
 * @property int $position
 * 
 * @property Menu $menu
 * @property Page $page
 * @property Collection|Menu[] $menus
 *
 * @package App\Models
 */
class Menu extends Model
{
	protected $table = 'menus';
	public $timestamps = false;

	protected $casts = [
		'is_blank' => 'int',
		'is_visibility' => 'int',
		'page_id' => 'int',
		'parent_id' => 'int',
		'position' => 'int'
	];

	protected $fillable = [
		'name',
		'link',
		'is_blank',
		'is_visibility',
		'page_id',
		'parent_id',
		'position'
	];

	public function menu()
	{
		return $this->belongsTo(Menu::class, 'parent_id');
	}

	public function page()
	{
		return $this->belongsTo(Page::class);
	}

	public function menus()
	{
		return $this->hasMany(Menu::class, 'parent_id');
	}
}
