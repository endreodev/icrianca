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
 * Class State
 * 
 * @property int $id
 * @property string $name
 * @property string $initials
 * @property int $country_id
 * @property int $status
 * @property int $cd_ibge
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class State extends Model
{
	use DataBase,SoftDeletes;
	protected $table = 'states';


	const NAME 		= 'Estados';
	const PREFIX 	= 'state';

	protected $casts = [
		'country_id' => 'int',
		'status' => 'int',
		'cd_ibge' => 'int'
	];

	protected $fillable = [
		'name',
		'initials',
		'country_id',
		'status',
		'cd_ibge'
	];
	public static $rules = [
		'name'       	=> 'required',
		'initials'      => 'required',
		'country_id'    => 'required',
	];

	public function country()
	{
		return $this->hasOne(\App\Models\Country::class, 'id', 'country_id');
	}
}
