<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PortfolioDetail
 * 
 * @property int $id
 * @property string|null $image
 * @property string|null $video
 * @property int $portfolio_id
 * 
 * @property Portfolio $portfolio
 *
 * @package App\Models
 */
class PortfolioDetail extends Model
{
	protected $table = 'portfolio_details';
	public $timestamps = false;

	protected $casts = [
		'portfolio_id' => 'int'
	];

	protected $fillable = [
		'image',
		'video',
		'portfolio_id'
	];

	public function portfolio()
	{
		return $this->belongsTo(Portfolio::class);
	}
}
