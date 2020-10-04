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
 * @property bool $is_blank
 * @property int|null $page_id
 * @property int|null $parent_id
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
		'is_blank' => 'bool',
		'page_id' => 'int',
		'parent_id' => 'int'
	];

	protected $fillable = [
		'name',
		'link',
		'is_blank',
		'page_id',
		'parent_id'
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
