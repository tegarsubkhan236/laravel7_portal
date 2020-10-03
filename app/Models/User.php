<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $nama
 * @property string $username
 * @property string $password
 * @property string $alamat
 * @property string|null $email
 * @property string|null $no_hp
 * @property int $level
 * @property Carbon $created_at
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';
	public $timestamps = false;

	protected $casts = [
		'level' => 'int'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'nama',
		'username',
		'password',
		'alamat',
		'email',
		'no_hp',
		'level'
	];
}
