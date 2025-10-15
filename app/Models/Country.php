<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Classes\DataBase;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Country
 * 
 * @property int $id
 * @property string $name
 * @property string $initials
 * @property bool $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Country extends Model
{
	use DataBase, SoftDeletes;
	protected $table = 'countries';

	const NAME 		= 'País';
	const PREFIX 	= 'country';

	protected $casts = [
		'status' => 'bool'
	];

	protected $fillable = [
		'name',
		'initials',
		'status'
	];

	public static $rules = [
		'name'       	=> 'required',
		'initials'      => 'required',
	];

	public function states()
	{
		return $this->hasMany(\App\Models\State::class, 'country_id', 'id');
	}
}
