<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Portfolio
 * 
 * @property int $id
 * @property string $title
 * @property string|null $desc
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|PortfolioDetail[] $portfolio_details
 *
 * @package App\Models
 */
class Portfolio extends Model
{
	protected $table = 'portfolios';

	protected $fillable = [
		'title',
		'desc'
	];

	public function portfolio_details()
	{
		return $this->hasMany(PortfolioDetail::class);
	}
}
